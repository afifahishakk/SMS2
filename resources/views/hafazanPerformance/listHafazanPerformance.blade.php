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
                <th>Week</th>
                <th>Month</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($hafazans as $hafazan)
                    <tr>
                        <td><img src="/image/students/{{ $hafazan->student->photo }}"/></td>
                        <td>{{ $hafazan->student->name }}</td>
                        <td>{{ $hafazan->day }}</td>
                        <td>{{ $hafazan->week }}</td>
                        <td>{{ $hafazan->month }}</td>
                        <td>{{ $hafazan->year }}</td>
                        <td>
                            {{-- <form action="" method="POST">
                                <a  href=""><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                @csrf
                                @method('DELETE')

                                <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                            </form> --}}
                            <a href="{{ route('hafazan.show',$hafazan->id) }}" data-toggle='tooltip' data-placement='left' title='View'>
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
