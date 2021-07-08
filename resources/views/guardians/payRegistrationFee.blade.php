@extends('layout.masterParent')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registration Fees Timetable</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" role="grid">
                          <thead>
                            <tr class="table-primary">
                                  <th>No</th>
                                  <th>Perkara/Jenis Yuran</th>
                                  <th>RM</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- display data untuk fee umum -->
                            <?php
                                // $bilUmum = 1;
                                // $jumlahUmum = 0;
                                // $sqlUmum = mysql_query("SELECT * FROM registration_fee WHERE fee_category_id = 1");
                                // while($rowUmum = mysql_fetch_array($sqlUmum))
                                // {
                                //     echo "<tr>
                                //             <td>$bilUmum</td>
                                //             <td>$rowUmum[fee_type]</td>
                                //             <td>$rowUmum[fee]</td>
                                //             </tr>";

                                //     $jumlahUmum += $rowUmum[fee];
                                //     $bilUmum++;
                                // }

                            ?>
                            @php
                                $bil = 1;
                                $jumlahUmum = 0;
                            @endphp
                            @foreach ($fees as $fee)

                                <tr>
                                    <td>{{ $bil }}</td>
                                    <td>{{ $fee->fee_type }}</td>
                                    <td>{{ $fee->fee_total }}</td>
                                </tr>
                                @php
                                    $jumlahUmum += $fee->fee_total;
                                    $bil++;
                                @endphp
                            @endforeach

                            <tr>
                                <td colspan="3" class="text-center">BARANG KEPERLUAN PELAJAR</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-center">a. Pelajar Lelaki</td>
                            </tr>
                            @php
                                $bil = 1;
                                $jumlahlelaki = 0;
                            @endphp
                            @foreach ($lelakifees as $fee)

                                <tr>
                                    <td>{{ $bil }}</td>
                                    <td>{{ $fee->fee_type }}</td>
                                    <td>{{ $fee->fee_total }}</td>
                                </tr>
                                @php
                                    $bil++;
                                    $jumlahlelaki += $fee->fee_total;

                                @endphp
                            @endforeach

                            <!-- display data untuk fee pelaajr lelaki -->
                            <?php
                                // $bilLelaki = 1;
                                // $jumlahLelaki = 0;
                                // $sqlLelaki = mysql_query("SELECT * FROM registration_fee WHERE fee_category_id = 2");
                                // while($rowLelaki = mysql_fetch_array($sqlLelaki))
                                // {
                                //     echo "<tr>
                                //             <td>$bilLelaki</td>
                                //             <td>$rowLelaki[fee_type]</td>
                                //             <td>$rowLelaki[fee]</td>
                                //             </tr>";

                                //     $jumlahLelaki += $rowLelaki[fee];
                                //     $bilLelaki++;
                                // }

                            ?>
                            <tr>
                                <td colspan="3" class="text-center">b. Pelajar Perempuan</td>
                            </tr>
                            @php
                                $bil = 1;
                                $jumlahperempuan = 0;
                            @endphp
                            @foreach ($perempuanfees as $fee)

                                <tr>
                                    <td>{{ $bil }}</td>
                                    <td>{{ $fee->fee_type }}</td>
                                    <td>{{ $fee->fee_total }}</td>
                                </tr>
                                @php
                                    $bil++;
                                    $jumlahperempuan += $fee->fee_total;

                                @endphp
                            @endforeach

                            <!-- display data untuk fee pelaajr ppuan -->
                            <?php
                                // $bilPP = 1;
                                // $jumlahPP = 0;
                                // $sqlPP = mysql_query("SELECT * FROM registration_fee WHERE fee_category_id = 3");
                                // while($rowPP = mysql_fetch_array($sqlPP))
                                // {
                                //     echo "<tr>
                                //             <td>$bilPP</td>
                                //             <td>$rowPP[fee_type]</td>
                                //             <td>$rowPP[fee]</td>
                                //             </tr>";


                                //     $jumlahPP += $rowPP[fee];
                                //     $bilPP++;
                                // }


                                // /* jumlah keseluruhan */
                                // $jumlahKeseluruhan = $jumlahUmum + $jumlahLelaki + $jumlahPP;
                                // $jumlahKeseluruhanFormat = number_format($jumlahKeseluruhan, 2, '.', '');

                            ?>
                            <tr>
                                <td colspan="2" class="text-right">JUMLAH KESELURUHAN</td>
                                <td>
                                    @php
                                        $jumlah = $jumlahUmum + $jumlahlelaki + $jumlahperempuan;
                                    @endphp
                                        {{ number_format($jumlah,2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Choose Your Child & Payment Option</h4>
                <form method="post" action="{{route('payment.fee')}}" enctype="multipart/form-data">
                @csrf
                @php
                    use Carbon\Carbon;
                    $date = Carbon::now();
                    $date->toDateString();
                @endphp     
                <input type="hidden" name="payment_date" value="{{$date}}">
                <input type="hidden" name="p_type_id" value="1">
                <input type="hidden" name="parent" value="{{session('UserID')}}">
                <input type="hidden" name="amount" value="{{ $jumlah }}">
                <input type="hidden" name="month" value="0">
                <input type="hidden" name="year" value="0">
                <div class="form-body">
                    <p class="card-description text-primary">
                        <i class='menu-icon mdi mdi-account-star'></i> Choose your children
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>children</label>
                                <select class="form-control" name="student_ic" required>
                                    <option value="">- choose your child -</option>
                                    @foreach ($students as $student)
                                        @if(($student->status == "Processing") || ($student->status == "Rejected"))
                                            <option class='bg-danger text-white' value='{{ $student->ic_no }}' disabled>{{ $student->name }}</option>
                                        @else
                                            <option value='{{ $student->ic_no }}'>{{ $student->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <p class="card-description text-primary">
                        <i class="menu-icon mdi mdi-google-wallet"></i> Choose payment option
                    </p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-radio">
                                    <div class="form-check form-check-warning">
                                        <input type="radio" name="payment_option" data-id="cc" value="Cash">
                                        <label for="Cash">Cash</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-radio">
                                    <div class="form-check form-check-warning">
                                        <input type="radio" name="payment_option" data-id="ob" value="Online Banking">
                                        <label for="Online Banking">Online Banking</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div id="ob" class="none">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Transfer/Bank in <b>RM{{ number_format($jumlah,2) }}</b> or any amount you willing to pay to the following account:</label><br />
                                    <span class="badge badge-primary">Holder Name : PTSDI SDN BHD</span><br />
                                    <span class="badge badge-warning">Account Number : 771237765777</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" placeholder="Amount you willing to pay" name="paid_amount" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Upload payment proof</label>
                                    <input type="file" class="form-control" style="padding: 0.36rem 0.55rem;" placeholder="Upload payment proof" name="proof" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cc" class="none">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-danger">Please provide total amount of <b>RM{{ number_format($jumlah,2) }}</b> or any amount you willing to pay once you visit our Tahfiz to complete the registration payment. Thank you</label><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <a href="dashboard.php" class="btn btn-outline-dark">
                    <i class="mdi mdi-keyboard-backspace"></i> Cancel
                </a>
                <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Confirm</button>
            </form>
        </div>
    </div>
</div>



@endsection
