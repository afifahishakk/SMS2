@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Student Hafazan Performance</h4>
        <form action="{{ route('hafazan.store') }}" method="post" enctype="multipart/form-data">

            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Update Student Hafazan Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Student</label>
                    <p>{{ $student->name }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Week</b></label>
                    <p>{{ $hafazans[0]->week }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Month</b></label>
                    <p>{{ $hafazans[0]->month }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Year</b></label>
                    <p>{{ $hafazans[0]->year }}</p>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table dataTable no-footer" role="grid">
                                <thead>
                                    <tr class="table-primary" style="text-align:center;">
                                        <th>Date/Day</th>
                                        <th>Activity</th>
                                        <th colspan="3">Start</th>
                                        <th colspan="3">End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-success">
                                        <td></td>
                                        <td>Juz</td>
                                        <td>Surah</td>
                                        <td>Page</td>
                                        <td>Juz</td>
                                        <td>Surah</td>
                                        <td>Page</td>
                                        <td>Juz</td>
                                    </tr>
                                    @foreach($hafazans as $key=>$hafazan)
																			@if($key % 2)
																				<tr class="table-warning">
																			@else
																				<tr class="table-secondary">
																			@endif
                                            <td>{{$hafazan->day}}</td>
                                            <td>Talaqqi</td>
                                            <td>{{$hafazan->talaqi_start_juz}}</td>
                                            <td>{{$hafazan->talaqi_start_surah}}</td>
                                            <td>{{$hafazan->talaqi_start_halaman}}</td>
                                            <td>{{$hafazan->talaqi_end_juz}}</td>
                                            <td>{{$hafazan->talaqi_end_surah}}</td>
                                            <td>{{$hafazan->talaqi_end_halaman}}</td>
                                        </tr>
                                        @if($key % 2)
																				<tr class="table-warning">
																				@else
																					<tr class="table-secondary">
																				@endif
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>{{$hafazan->hafazan_start_juz}}</td>
                                            <td>{{$hafazan->hafazan_start_surah}}</td>
                                            <td>{{$hafazan->hafazan_start_halaman}}</td>
                                            <td>{{$hafazan->hafazan_end_juz}}</td>
                                            <td>{{$hafazan->hafazan_end_surah}}</td>
                                            <td>{{$hafazan->hafazan_end_halaman}}</td>
                                        </tr>
                                        @if($key % 2)
																					<tr class="table-warning">
																				@else
																					<tr class="table-secondary">
																				@endif
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>{{$hafazan->ulangan_baru_start_juz}}</td>
                                            <td>{{$hafazan->ulangan_baru_start_surah}}</td>
                                            <td>{{$hafazan->ulangan_baru_start_halaman}}</td>
                                            <td>{{$hafazan->ulangan_baru_end_juz}}</td>
                                            <td>{{$hafazan->ulangan_baru_end_surah}}</td>
                                            <td>{{$hafazan->ulangan_baru_end_halaman}}</td>
                                        </tr>
                                        @if($key % 2)
																					<tr class="table-warning">
																				@else
																					<tr class="table-secondary">
																				@endif
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>{{$hafazan->ulangan_lama_start_juz}}</td>
                                            <td>{{$hafazan->ulangan_lama_start_surah}}</td>
                                            <td>{{$hafazan->ulangan_lama_start_halaman}}</td>
                                            <td>{{$hafazan->ulangan_lama_end_juz}}</td>
                                            <td>{{$hafazan->ulangan_lama_end_surah}}</td>
                                            <td>{{$hafazan->ulangan_lama_end_halaman}}</td>
                                        </tr>
                                        @if($key % 2)
																					<tr class="table-warning">
																				@else
																					<tr class="table-secondary">
																				@endif
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">{{$hafazan->remark}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class='container-fluid w-100'>
                <a onclick="window.print()" target="_blank" class='btn btn-primary float-left mt-4'>
                    <i class='mdi mdi-printer mr-1'></i>Print
                </a>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
