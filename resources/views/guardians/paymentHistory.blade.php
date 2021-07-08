@extends('layout.masterParent')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Payment History</h4>
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Child</th>
                            <th>Pay./ Details</th>
                            <th>Month/Year</th>
                            <th>Option</th>
                            <th>Fee</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td><span class='badge badge-success'>{{ $payment->payment_id }}</span></td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->student->name }}</td>
                            <td>
                                <span class='badge badge-info'>Amount: {{ $payment->amount}}</span><br />
                                <span class='badge badge-warning'>Paid: {{ $payment->paid_amount }} </span><br />
                                <span class='badge badge-danger'>Balance: {{ $payment->balance}} </span>
                            </td>
                            <td>{{ $payment->month }}/{{ $payment->year }}</td>
                            <td><span class='badge badge-success'>{{ $payment->payment_option }}</span></td>
                            <td>{{$payment->p_type_id == '1'? 'Registration' : 'Monthly'}}</td>
                            <td>
                                @if($payment->payment_status == "Partial Paid")
                                  <a href="{{url('/payment-history/'.$payment->id.'/'.$payment->student->id. '/balance' )}}"> {{ $payment->payment_status }}</a>
                                @else
                                  {{ $payment->payment_status }}
                                @endif
                            </td>
                            
                        </tr>
                        
                    @endforeach
                    
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
