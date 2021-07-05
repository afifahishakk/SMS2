@extends('layout.master')

@section('content')

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
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Choose Student & Payment Option</h4>
                <form method="post" action="{{ route('payment.fee') }} " enctype="multipart/form-data">
                @csrf
                @php
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $today = date("Y-m-d");
                @endphp
                <input type="hidden" name="payment_date" value="{{ $today }}">
                <input type="hidden" name="p_type_id" value="1">
                <input type="hidden" name="amount" value="{{ $jumlah }}">
                <div class="form-body">
                    <p class="card-description text-primary">
                        <i class='menu-icon mdi mdi-account-star'></i> Choose student
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Student</label>
                                <select class="form-control" name="student_ic" required />
                                    <option value="">- choose student -</option>
                                    @foreach ($students as $student)
                                        @if(($student->status == "Processing") || ($student->status == "Rejected"))
                                            <option class='bg-danger text-white' value='{{ $student->ic_no }}' disabled>{{ $student->name }}</option>
                                        @else
                                            <option value="{{ $student->ic_no }}">{{ $student->name }}</option>
                                        @endif
                                    @endforeach
                                    <?php
                                        // $sqlStd = mysql_query("SELECT * FROM enrollment");
                                        // while($rowStd = mysql_fetch_array($sqlStd))
                                        // {
                                        //     if(($rowStd[status] == "Processing") || ($rowStd[status] == "Rejected"))
                                        //         echo "<option class='bg-danger text-white' value='$rowStd[ic]' disabled>$rowStd[name]</option>";
                                        //     else
                                        //         echo "<option value='$rowStd[ic]'>$rowStd[name]</option>";
                                        // }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <p class="card-description text-primary">
                        <i class="menu-icon mdi mdi-google-wallet"></i> Payment Details
                    </p>
                </div>
                <div id="ob">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Amount need to pay <b>RM{{ number_format($jumlah,2) }}</b>.</label>
                                    <input type="number" class="form-control" placeholder="Amount parent willing to pay" name="paid_amount" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name='payment_status' class='form-control' required>
                                        <option value=''>- choose status -</option>
                                        <option value='Partial Paid'>Partial Paid</option>
                                        <option value='Paid'>Paid</option>
                                    </select>
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

