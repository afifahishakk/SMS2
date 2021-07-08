@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Student</h4>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Student </th>
                            <th> Name </th>
                            <th> IC </th>
                            <th> DOB </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="/image/students/{{ $student->photo }}" width="100px"></td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->ic_no }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>
                                @if($student->status == 'Approved')
                                 <span style="color:rgb(2, 243, 2)">
                                  {{ $student->status }}
                                </span> 
                                @elseif($student->status == 'Pending') 
                                  <button class="btn btn-primary student_approve" type="button" data-toggle="modal" data-id="{{$student->id}}" data-target="#approvedStudent"> Pending</button>
                                @elseif($student->status == 'Declined')
                                <span style="color:rgb(243, 10, 2)">
                                  {{$student->status}}
                                </span>  
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                                    <a  href="{{ route('student.edit',$student->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
      </div>
    </div>
</div>

 {{-- modal approve student  --}}
<div class="modal" id="approvedStudent" style="z-index: 2045 !important;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content animated bounceInRight">
          <div class="modal-header">
              <h6 class="modal-title " style="text-align:center">Student Approval</h6>
          </div>
          <div class="modal-body" style="text-align:center">
            <div class="row">
              <div class="col-md-12" style="margin-bottom:40px">
                Approve this student?
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <form action="{{ route('student.decline') }}" method="POST">
                  @csrf
                  <input type="hidden" name="user_id" id="user_id">
                  <button  class="btn btn-danger" type="submit" style="color:white"><i class="mdi mdi-account-off-outline " style="color:white"></i> Decline</button>
                </form>
              </div>
              <div class="col-md-6">
                <form action="{{ route('student.approve') }}" method="POST">
                  @csrf
                  <input type="hidden" name="user_id" id="user_id">
                    <button  class="btn btn-primary" type="submit" style="color:white"><i class="mdi mdi-account-check-outline "style="color:white"></i> Approve</button>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
@push('scripts')
    <script>
      $(document).on("click", ".student_approve", function () {
     var user_id = $(this).data('id');
     $(".modal-body #user_id").val( user_id );
});
      </script>
@endpush