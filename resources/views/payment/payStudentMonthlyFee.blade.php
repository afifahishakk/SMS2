@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
              <h4 class="card-title">Monthly Fees</h4>
                <form method='post' action='{{ route('payment.monthlyfee') }}' enctype='multipart/form-data'>
                    @csrf
                <p class="card-description text-primary">
                 <i class='menu-icon mdi mdi-google-wallet'></i> Fill in the following details
               </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Student</label>
                        <select class="form-control" name="student_ic" required />
                            <option value="">- choose student -</option>
                            @foreach ($students as $item )
                                <option value="{{ $item->ic_no }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Month</label>
                        <select class="form-control" name="month" required />
                            <option value=''>- choose month -</option>
                            <option value='01'>January</option>
                            <option value='02'>February</option>
                            <option value='03'>March</option>
                            <option value='04'>April</option>
                            <option value='05'>May</option>
                            <option value='06'>June</option>
                            <option value='07'>July</option>
                            <option value='08'>August</option>
                            <option value='09'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control" name="year" required />
                            <option value=''>- choose year -</option>
                            @foreach ($monthlyFees as $key => $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
            </div>
            <div class='row'>
                <div class='col-12 grid-margin'>
                  <div class='card'>
                    <div class='card-body'>
                      <h4 class='card-title'>Monthly Payment Details</h4>
                        @php
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                            $today = date("Y-m-d");
                        @endphp
                      <input type='hidden' name='payment_date' value='{{ $today }}'>
                      {{-- <input type='hidden' name='student_ic' value='$student_ic'> --}}
                      <input type='hidden' name='p_type_id' value='1'>
                      {{-- <input type='hidden' name='month' value='$month'> --}}
                      {{-- <input type='hidden' name='year' value='$year'> --}}
                      {{-- <input type='hidden' name='parent' value='$parent'> --}}
                      <input type='hidden' name='amount' value='{{ $monthlyFees[$key]->fee }}'>
                        <div class='form-body'>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label>Amount need to pay <b>RM{{ $monthlyFees[$key]->fee }}</b>.</label>
                                        <input type='number' class='form-control' placeholder='Amount parent willing to pay' name='paid_amount' required />
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
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
                        <br />
                        <a href='dashboard.php' class='btn btn-outline-dark'>
                            <i class='mdi mdi-keyboard-backspace'></i> Cancel
                        </a>
                        <button type='submit' name='submit' class='btn btn-primary mr-2'><i class='mdi mdi-check'></i> Confirm</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                {{-- <br />
                   <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
                <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-arrow-right"></i> Proceed</button> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>


@endsection
