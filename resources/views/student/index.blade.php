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
                            <td>{{ $student->status }}</td>
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
@endsection
