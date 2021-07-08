@extends('layout.masterTeacherTahfiz')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Hafazan Performance</h4>
        <div class="table-responsive">
          <table id="datatable" class="table dataTable no-footer" role="grid">
            <thead>
              <tr>
                <th>Student</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td><img src="/image/students/{{ $student->photo }}"/></td>
                        <td>{{ $student->name }}</td>
                        <td>
                            
                            <a href="{{ route('hafazan.show',$student->id) }}" data-toggle='tooltip' data-placement='left' title='View'>
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
