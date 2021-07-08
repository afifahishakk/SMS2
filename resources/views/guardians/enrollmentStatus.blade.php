@extends('layout.masterParent')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Your children enrollment status</h4>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Child</th>
                        <th>Name</th>
                        <th>IC</th>
                        <th>DOB</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td><img src="/image/students/{{ $student->photo }}" width="100px"></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->ic_no }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>
                          <span class='badge 
                          @php
                            $status = (
                            ($student->status == "Approved") ? "badge-success" :
                              (($student->status == "Pending") ? "badge-warning" :
                                (($student->status == "Declined") ? "badge-danger" : ""))
                            );
                          @endphp
                          {{$status}}'>
                          {{ $student->status }}
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
