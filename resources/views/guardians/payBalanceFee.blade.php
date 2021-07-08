@extends('layout.masterParent')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pay Balance Fee</h4>
                <form method="post" action="{{route('payment.fee')}}" enctype="multipart/form-data">
                @csrf
                @php
                    use Carbon\Carbon;
                    $date = Carbon::now();
                    $date->toDateString();
                @endphp     
                <input type="hidden" name="payment_date" value="{{$date}}">
                <input type="hidden" name="p_type_id" value="{{$payment->p_type_id}}">
                <input type="hidden" name="parent" value="{{session('UserID')}}">
                <input type="hidden" name="amount" value="{{ $payment->balance }}">
                <input type="hidden" name="id_parent_payment" value="{{ $payment->id }}">
                <input type="hidden" name="month" value="{{ $payment->month }}">
                <input type="hidden" name="year" value="{{ $payment->year }}">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Children Name</label>
                                <select class="form-control" name="student_ic" required>
                                    <option value='{{ $student->ic_no }}'>{{ $student->name }}</option>
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
                                    <label>Transfer/Bank in <b>RM{{ $payment->balance }}</b> or any amount you willing to pay to the following account:</label><br />
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
                                    <label class="text-danger">Please provide total amount of <b>RM{{ $payment->balance }}</b> or any amount you willing to pay once you visit our Tahfiz to complete the registration payment. Thank you</label><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <a href="/payment-history" class="btn btn-outline-dark">
                    <i class="mdi mdi-keyboard-backspace"></i> Cancel
                </a>
                <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Confirm</button>
            </form>
        </div>
    </div>
</div>



@endsection
