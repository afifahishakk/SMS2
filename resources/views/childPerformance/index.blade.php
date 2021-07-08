@extends('layout.masterParent')

@section('content')

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
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    @if($student->purpose != 'SPM')
                      <tr>
                        <td><img src="/image/students/{{ $student->photo }}"/></td>
                        <td>{{ $student->name }}</td>
                        <td>
                            
                            <a href="{{ url('view-child-performance/' . $student->id) }}" data-toggle='tooltip' data-placement='left' title='View'>
                                <i class='mdi mdi-comment-text-outline text-primary'></i>
                            </a>
                        </td>
                      </tr>
                    @endif
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
                      @if($student->purpose != 'Tahfiz')
                        <tr>
                            <td class='py-1'><img src="/image/students/{{ $student->photo }}"/></td>
                            <td>{{ $student->name }}</td>
                            @if($student->academic->count() > 0)
                                <td>{{ $student->academic[0]->select('year')->groupBy('year')->first()->year ? $student->academic[0]->select('year')->groupBy('year')->first()->year : '' }}</td>
                            @else
                                <td>N/A</td>
                            @endif
                            <td>
                                <a href="/child-academic-performance-details/{{ $student->id }}"
                                data-toggle='tooltip' data-placement='left' title='View'>
                                    <i class='mdi mdi-comment-text-outline text-primary'></i>
                                </a>
                            </td>
                        </tr>
                      @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
