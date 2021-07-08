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
                                {{-- <a href='#modal' data-toggle='modal' data-target='#detailsPayment$row[payment_id]'>

                                </a> --}}
                                <button class="btn btn-success registration_fee_approve" type="button" data-toggle="modal" data-id="{{$payment->id}}" data-target="#approvedRegistrationPayment">
                                    <span style="color:black">{{ $payment->payment_id }}</span>
                                </button>

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
 {{-- modal approve registration payment  --}}
 <div class="modal" id="approvedRegistrationPayment" style="z-index: 2045 !important; " tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
 aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content animated bounceInRight">
         <div class="modal-header">
             <h6 class="modal-title " style="text-align:center">Student Approval</h6>
         </div>
         <div class="modal-body" id="editElementBody">
            
        </div>
     </div>
 </div>
</div>
@endsection
@push('scripts')
  <script>
      $('#approvedRegistrationPayment').on('show.bs.modal', function(e) {
        $('#editElementBody').html('');
        var myDataId= $(e.relatedTarget).attr('data-id'); 
      fetchRegistrationPayment(myDataId)

      });
      function fetchRegistrationPayment(id){
        $.ajax({
              url:"{{ route('payment.fetchRegistrationPayment') }}",
              method:"POST",
              data:{
                  id
              },
              headers: {
                  'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },
              success: (resultsJSON) =>{
                let results = JSON.parse(resultsJSON);
                console.log(results.data.id);
                $('#editElementBody').append(`
                  <div class="row">
                    <div class="col-lg-12">
                      <form action="/payment/${results.data.id}/approveRegistrationFee" method="post" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="id_parent_payment" name="id_parent_payment" class="form-control" value="${results.data.id_parent_payment}" >
                        <div class="form-group"><label class="col-sm-3 control-label">Payment Proof</label>
                          <div class="col-sm-9" style="text-align:center"><img src="/image/receiptPayment/${results.data.proof}" alt="proof payment" width="80%" height="80%"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Payment Method</label>
                          <div class="col-sm-9"><input type="text" id="payment_option" name="payment_option" class="form-control" value="${results.data.payment_option}" placeholder="Enter any text" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Total Amount</label>
                          <div class="col-sm-9"><input type="text" id="amount" name="amount" class="form-control" value="${results.data.amount}" placeholder="Enter any text" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Payment Date</label>
                          <div class="col-sm-9"><input type="text" id="payment_date" name="payment_date" class="form-control" value="${results.data.payment_date}" placeholder="Enter any text" readonly></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Paid Amount</label>
                          <div class="col-sm-9"><input type="text" id="paid_amount" name="paid_amount" class="form-control" value="${results.data.paid_amount}" placeholder="Enter any text"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Payment Status</label>
                          <div class="col-sm-9">
                            <div class="form-radio">
                                    <div class="form-check form-check-warning">
                                        <input type="radio" name="payment_status" value="Paid" ${results.data.payment_status == 'Paid'? 'checked':''}>
                                        <label for="Paid">Paid</label>
                                    </div>
                                </div>
                                <div class="form-radio">
                                    <div class="form-check form-check-warning">
                                        <input type="radio" name="payment_status"value="Partial Paid" ${results.data.payment_status == 'Partial Paid'? 'checked':''}>
                                        <label for="Partial Paid">Partial Paid</label>
                                    </div>
                                </div>
                                <div class="form-radio">
                                    <div class="form-check form-check-warning">
                                        <input type="radio" name="payment_status" value="Pending" ${results.data.payment_status == 'Pending'? 'checked':''}>
                                        <label for="Pending">Pending</label>
                                    </div>
                                </div>
                          </div>
                        </div>
                        <div class="form-group" style="text-align:center">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Approve</button>
                        </div>
                      </form>
                      
                    </div>
                  </div>
                `)
              

              },
              error: err => console.error(err)
            })
      }


  </script>
@endpush