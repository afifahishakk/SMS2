@extends('layout.masterTeacherTahfiz')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Student Hafazan Performance</h4>
        <form method="post" enctype="multipart/form-data">

            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Update Student Hafazan Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Student</label>
                    <p>{{ $hafazans->student->name }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Week</b></label>
                    <p>{{ $hafazans->week }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Month</b></label>
                    <p>{{ $hafazans->month }}</p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label><b>Year</b></label>
                    <p>{{ $hafazans->year }}</p>
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
                                    <tr class="table-warning">
                                        <td><?php //echo $sunDateStringFormat . " (Sun)"; ?></td>
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
                                        <td><?php // $monDateStringFormat . " (Mon)"; ?></td>
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
                                    </tr>


                                    <tr class="table-warning">
                                        <td><?php // $tueDateStringFormat . " (Tue)"; ?></td>
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
                                        <td><?php // $wedDateStringFormat . " (Wed)"; ?></td>
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
                                        <td><?php // $thuDateStringFormat . " (Thu)"; ?></td>
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
                                        <td><?php // $friDateStringFormat . " (Fri)"; ?></td>
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
                                        <td>ulangan_lama_end_juz]; ?></td>
                                        <td>ulangan_lama_end_surah]; ?></td>
                                        <td>ulangan_lama_end_halaman]; ?></td>
                                    </tr>

                                    <tr class="table-secondary">
                                        <td></td>
                                        <td>Remark</td>
                                        <td colspan="3">remark</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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
