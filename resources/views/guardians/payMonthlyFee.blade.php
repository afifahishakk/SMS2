@extends('layout.masterParent')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Monthly Fees</h4>
                <form method="post" enctype="multipart/form-data">
                    <p class="card-description text-primary">
                    <i class='menu-icon mdi mdi-account-star'></i> Fill in the following details
                    </p>
                    <hr/>
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Child</label>
                            <select class="form-control" name="student_ic" required />
                                <option value="">- choose your child -</option>
                                @foreach ($students as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                <option value='2020'>2020</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2022</option>
                                <option value='2023'>2023</option>
                                <option value='2024'>2024</option>
                                <option value='2025'>2025</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <br />
                    <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
                    <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-arrow-right"></i> Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-12 grid-margin'>
        <div class='card'>
            <div class='card-body'>
                <h4 class='card-title'>Monthly Payment Details for Year </h4>
                <form method='post' action='payment_gateway.php' enctype='multipart/form-data'>
                <input type='hidden' name='payment_date' value='$payment_date'>
                <input type='hidden' name='student_ic' value='$student_ic'>
                <input type='hidden' name='p_type_id' value='$p_type_id'>
                <input type='hidden' name='month' value='$month'>
                <input type='hidden' name='year' value='$year'>
                <input type='hidden' name='parent' value='$parent'>
                <input type='hidden' name='amount' value='$rowPay[fee]'>
                    <div class='form-body'>
                        <p class='card-description text-primary'>
                        <i class='menu-icon mdi mdi-google-wallet'></i> Choose payment option
                        </p>
                        <div class='row'>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <div class='form-radio'>
                                        <div class="form-check form-check-warning">
                                            <input type="radio" name="payment_option" data-id="cc" value="Cash">
                                            <label for="Cash">Cash</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group'>
                                    <div class='form-radio'>
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
                    @foreach($monthlyFees as $monthlyfee)
                        <div id='ob' class='none'>
                            <div class='form-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Transfer/Bank in <b>RM{{ $monthlyfee->fee }} Monthly Fees</b> or any amount you willing to pay to the following account:</label><br />
                                            <span class='badge badge-primary'>Holder Name : PTSDI SDN BHD</span><br />
                                            <span class='badge badge-warning'>Account Number : 771237765777</span>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Amount</label>
                                            <input type='number' class='form-control' placeholder='Amount you willing to pay' name='paid_amount' />
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group'>
                                            <label>Upload payment proof</label>
                                            <input type='file' class='form-control' style='padding: 0.36rem 0.55rem;' placeholder='Upload payment proof' name='proof' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id='cc' class='none'>
                            <div class='form-body'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label class='text-danger'>Please provide total amount of <b>RM{{ $monthlyfee->fee }}</b> or any amount you willing to pay once you visit our Tahfiz to complete the registration payment. Thank you</label><br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
@endsection
