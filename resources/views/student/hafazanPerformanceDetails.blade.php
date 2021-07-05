@extends('layout.master')

@section('content')
{{-- {{ dd($hafazans) }} --}}

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">View Hafazan Performance</h4>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="student_ic" value="">
                    <p class="card-description text-primary">
                        <i class='menu-icon mdi mdi-book-open-page-variant'></i> View Hafazan Performance Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Student</b></label>
                                <p>{{ $student->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><b>Week</b></label>
                                <p>{{ $student->hafazan[0]->select('week')->groupBy('week')->first()->week }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><b>Month</b></label>
                                <p>{{ $student->hafazan[0]->select('month')->groupBy('month')->first()->month }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><b>Year</b></label>
                                <p>{{ $student->hafazan[0]->select('year')->groupBy('year')->first()->year }}</p>
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
                                        @foreach ($hafazansSun as $hafazan)

                                        @php
                                            $sunDateString = str_replace('-', '/', $hafazan['date']);
                                            $sunDateStringFormat = date('d/m/Y', strtotime($sunDateString));

                                            if($sunDateStringFormat == "01/01/1970"){
                                                $sunDateStringFormat = "- - -";
                                            }
                                        @endphp
                                            {{-- {{dd($sunDateStringFormat . " (Sun)")}} --}}
                                        <tr class="table-warning">
                                            <td>{{ $sunDateStringFormat . " (Sun)" }}</td>
                                            <td>Talaqqi</td>
                                            <td>{{ $hafazan->talaqi_start_juz }}</td>
                                            <td>{{ $hafazan->talaqi_start_surah }}</td>
                                            <td>{{ $hafazan->talaqi_start_halaman }}</td>
                                            <td>{{ $hafazan->talaqi_end_juz }}</td>
                                            <td>{{ $hafazan->talaqi_end_surah }}</td>
                                            <td>{{ $hafazan->talaqi_end_halaman }}</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>{{ $hafazan->hafazan_start_juz }}</td>
                                            <td>{{ $hafazan->hafazan_start_surah }}</td>
                                            <td>{{ $hafazan->hafazan_start_halaman }}</td>
                                            <td>{{ $hafazan->hafazan_end_juz }}</td>
                                            <td>{{ $hafazan->hafazan_end_surah }}</td>
                                            <td>{{ $hafazan->hafazan_end_halaman }}</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>{{ $hafazan->ulangan_baru_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>{{ $hafazan->ulangan_lama_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">{{ $hafazan->remark }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @endforeach

                                        @foreach ($hafazansMon as $hafazan)

                                        @php
                                            $monDateString = str_replace('-', '/', $hafazan['date']);
                                            $monDateStringFormat = date('d/m/Y', strtotime($monDateString));

                                            if($monDateStringFormat == "01/01/1970"){
                                                $monDateStringFormat = "- - -";
                                            }
                                        @endphp


                                        <tr class="table-secondary">
                                            <td>{{ $monDateStringFormat . " (Mon)" }}</td>
                                            <td>Talaqqi</td>
                                            <td>{{ $hafazan->talaqi_start_juz }}</td>
                                            <td>{{ $hafazan->talaqi_start_surah }}</td>
                                            <td>{{ $hafazan->talaqi_start_halaman }}</td>
                                            <td>{{ $hafazan->talaqi_end_juz }}</td>
                                            <td>{{ $hafazan->talaqi_end_surah }}</td>
                                            <td>{{ $hafazan->talaqi_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>{{ $hafazan->hafazan_start_juz }}</td>
                                            <td>{{ $hafazan->hafazan_start_surah }}</td>
                                            <td>{{ $hafazan->hafazan_start_halaman }}</td>
                                            <td>{{ $hafazan->hafazan_end_juz }}</td>
                                            <td>{{ $hafazan->hafazan_end_surah }}</td>
                                            <td>{{ $hafazan->hafazan_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>{{ $hafazan->ulangan_baru_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>{{ $hafazan->ulangan_lama_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">{{ $hafazan->remark }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @endforeach

                                        @foreach ($hafazansTue as $hafazan)

                                        @php
                                            $tueDateString = str_replace('-', '/', $hafazan['date']);
                                            $tueDateStringFormat = date('d/m/Y', strtotime($tueDateString));

                                            if($tueDateStringFormat == "01/01/1970"){
                                                $tueDateStringFormat = "- - -";
                                            }
                                        @endphp

                                        <tr class="table-warning">
                                            <td>{{ $tueDateStringFormat . " (Tue)" }}</td>
                                            <td>Talaqqi</td>
                                            <td>{{ $hafazan->talaqi_start_juz }}</td>
                                            <td>{{ $hafazan->talaqi_start_surah }}</td>
                                            <td>{{ $hafazan->talaqi_start_halaman }}</td>
                                            <td>{{ $hafazan->talaqi_end_juz }}</td>
                                            <td>{{ $hafazan->talaqi_end_surah }}</td>
                                            <td>{{ $hafazan->talaqi_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>{{ $hafazan->hafazan_start_juz }}</td>
                                            <td>{{ $hafazan->hafazan_start_surah }}</td>
                                            <td>{{ $hafazan->hafazan_start_halaman }}</td>
                                            <td>{{ $hafazan->hafazan_end_juz }}</td>
                                            <td>{{ $hafazan->hafazan_end_surah }}</td>
                                            <td>{{ $hafazan->hafazan_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>{{ $hafazan->ulangan_baru_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_baru_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>{{ $hafazan->ulangan_lama_start_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_start_halaman }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_juz }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_surah }}</td>
                                            <td>{{ $hafazan->ulangan_lama_end_halaman }}</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">{{ $hafazan->remark }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @endforeach


                                        {{-- <tr class="table-secondary">
                                            <td>(Wed)</td>
                                            <td>Talaqqi</td>
                                            <td>talaqi_start_juz</td>
                                            <td>talaqi_start_surah</td>
                                            <td>talaqi_start_halaman</td>
                                            <td>talaqi_end_juz</td>
                                            <td>talaqi_end_surah</td>
                                            <td>talaqi_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>hafazan_start_juz</td>
                                            <td>hafazan_start_surah</td>
                                            <td>hafazan_start_halaman</td>
                                            <td>hafazan_end_juz</td>
                                            <td>hafazan_end_surah</td>
                                            <td>hafazan_end_halaman</td>
                                        </tr>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>ulangan_baru_start_juz</td>
                                            <td>ulangan_baru_start_surah</td>
                                            <td>ulangan_baru_start_halaman</td>
                                            <td>ulangan_baru_end_juz</td>
                                            <td>ulangan_baru_end_surah</td>
                                            <td>ulangan_baru_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>ulangan_lama_start_juz</td>
                                            <td>ulangan_lama_start_surah</td>
                                            <td>ulangan_lama_start_halaman</td>
                                            <td>ulangan_lama_end_juz</td>
                                            <td>ulangan_lama_end_surah</td>
                                            <td>ulangan_lama_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">remark</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr class="table-warning">
                                            <td>(Thu)</td>
                                            <td>Talaqqi</td>
                                            <td>talaqi_start_juz</td>
                                            <td>talaqi_start_surah</td>
                                            <td>talaqi_start_halaman</td>
                                            <td>talaqi_end_juz</td>
                                            <td>talaqi_end_surah</td>
                                            <td>talaqi_end_halaman</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>hafazan_start_juz</td>
                                            <td>hafazan_start_surah</td>
                                            <td>hafazan_start_halaman</td>
                                            <td>hafazan_end_juz</td>
                                            <td>hafazan_end_surah</td>
                                            <td>hafazan_end_halaman</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>ulangan_baru_start_juz</td>
                                            <td>ulangan_baru_start_surah</td>
                                            <td>ulangan_baru_start_halaman</td>
                                            <td>ulangan_baru_end_juz</td>
                                            <td>ulangan_baru_end_surah</td>
                                            <td>ulangan_baru_end_halaman</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>ulangan_lama_start_juz</td>
                                            <td>ulangan_lama_start_surah</td>
                                            <td>ulangan_lama_start_halaman</td>
                                            <td>ulangan_lama_end_juz</td>
                                            <td>ulangan_lama_end_surah</td>
                                            <td>ulangan_lama_end_halaman</td>
                                        </tr>

                                        <tr class="table-warning">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">remark</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr class="table-secondary">
                                            <td>(Fri)</td>
                                            <td>Talaqqi</td>
                                            <td>talaqi_start_juz</td>
                                            <td>talaqi_start_surah</td>
                                            <td>talaqi_start_halaman</td>
                                            <td>talaqi_end_juz</td>
                                            <td>talaqi_end_surah</td>
                                            <td>talaqi_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>New Hafazan</td>
                                            <td>hafazan_start_juz</td>
                                            <td>hafazan_start_surah</td>
                                            <td>hafazan_start_halaman</td>
                                            <td>hafazan_end_juz</td>
                                            <td>hafazan_end_surah</td>
                                            <td>hafazan_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat New Hafazan</td>
                                            <td>ulangan_baru_start_juz</td>
                                            <td>ulangan_baru_start_surah</td>
                                            <td>ulangan_baru_start_halaman</td>
                                            <td>ulangan_baru_end_juz</td>
                                            <td>ulangan_baru_end_surah</td>
                                            <td>ulangan_baru_end_halaman</td>
                                        </tr>

                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Repeat Previous Hafazan</td>
                                            <td>ulangan_lama_start_juz</td>
                                            <td>ulangan_lama_start_surah</td>
                                            <td>ulangan_lama_start_halaman</td>
                                            <td>ulangan_lama_end_juz</td>
                                            <td>ulangan_lama_end_surah</td>
                                            <td>ulangan_lama_end_halaman</td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <td></td>
                                            <td>Remark</td>
                                            <td colspan="3">remark</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> --}}
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
                    <br />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
