@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Academic Performance</h4>
        <div class="table-responsive">
          <table id="datatable" class="table dataTable no-footer" role="grid">
            <thead>
              <tr>
                <th>Student</th>
                <th>Name</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($academics as $academic)
                    <tr>
                        <td><img src="/image/students/{{ $academic->student->photo }}" width="100px"></td>
                        <td>{{ $academic->student->name }}</td>
                        <td>{{ $academic->year }}</td>
                        <td>
                            {{-- <form action="" method="POST">
                                <a  href=""><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                @csrf
                                @method('DELETE')

                                <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                            </form> --}}
                            <a href="{{ route('academic.show',$academic->id) }}" data-toggle='tooltip' data-placement='left' title='View'>
                                <i class='mdi mdi-comment-text-outline text-primary'></i>
                            </a>
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
