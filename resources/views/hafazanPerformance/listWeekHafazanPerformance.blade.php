@extends('layout.masterTeacherTahfiz')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Student's Hafazan Performance</h4>
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
                @foreach($hafazans as $key=>$hafazan)
                  {{-- @if($hafazan->week ) --}}
                    <tr>
                        <td><img src="/image/students/{{ $student->photo }}"/></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $hafazan->week }}</td>
                        <td>{{ $hafazan->month }}</td>
                        <td>{{ $hafazan->year }}</td>
                        <td>
                            <a href="{{ url('hafazan/' . $student->id . '/' . $hafazan->week . '/' . $hafazan->month . '/' . $hafazan->year .'/showPerformance')}}" data-toggle='tooltip' data-placement='left' title='View'>
                                <i class='mdi mdi-comment-text-outline text-primary'></i>
                            </a>
                        </td>
                    </tr>
                  {{-- @endif --}}
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
