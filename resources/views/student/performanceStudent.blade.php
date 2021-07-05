@extends('layout.master')

@section('content')
{{-- {{ dd($hafazans[0]->student, $academics) }} --}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your Children Performance for Hafazan</h4>
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Children</th>
                            <th>Name</th>
                            <th>Week</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    {{-- {{ dd($student->hafazan[0]->groupBy('week'))->first()->week }} --}}
                    <tr>
                        <td class='py-1'><img src="/image/students/{{ $student->photo }}"/></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->hafazan[0]->select('week')->groupBy('week')->first()->week }}</td>
                        <td>{{ $student->hafazan[0]->select('month')->groupBy('month')->first()->month }}</td>
                        <td>{{ $student->hafazan[0]->select('year')->groupBy('year')->first()->year }}</td>
                        <td>
                            <a href="/student-hafazan-performance-details/{{ $student->id }}"
                            data-toggle='tooltip' data-placement='left' title='View'>
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
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Your Children Performance For Academic</h4>
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Children </th>
                            <th>Name </th>
                            <th>Year</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td class='py-1'><img src="/image/students/{{ $student->photo }}"/></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->academic[0]->select('year')->groupBy('year')->first()->year }}</td>
                        <td>
                            <a href="/student-academic-performance-details/{{ $student->id }}"
                            data-toggle='tooltip' data-placement='left' title='View'>
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
</div>
@endsection
