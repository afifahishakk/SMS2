@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Manage Registration Fees</h4>
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
                            <th>Student</th>
                            <th>Pay./ Details</th>
                            <th>Option</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                    {{-- {{ dd($students) }} --}}
                        <tr>
                            <td>
                                <span class='badge badge-success'>{{ $payment->payment_id }}</span>
                                {{-- <a href='#modal' data-toggle='modal' data-target='#detailsPayment$row[payment_id]'>

                                </a> --}}
                            </td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->student->name }}</td>
                            <td>
                                <span class='badge badge-info'>Amount: {{ $payment->amount}}</span><br />
                                <span class='badge badge-warning'>Paid: {{ $payment->paid_amount }} </span><br />
                                <span class='badge badge-danger'>Balance: {{ $payment->balance}} </span>
                            </td>
                            <td><span class='badge badge-success'>{{ $payment->payment_option }}</span></td>
                            <td>
                                @if($payment->payment_status == "Pending")

                                    <span class='badge badge-warning'>{{ $payment->payment_status}}</span></a>

                                @elseif ($payment->payment_status == "Declined")

                                    <span class='badge badge-danger'>{{ $payment->payment_status}}</span></a>

                                @elseif ($payment->payment_status == "Partial Paid")

                                    <span class='badge badge-primary'>{{ $payment->payment_status}}</span></a>

                                @elseif ($payment->payment_status == "Paid")

                                    <span class='badge badge-success'>{{ $payment->payment_status}}</span></a>

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
