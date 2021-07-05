@extends('layout.masterTeacherTahfiz')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Student Hafazan Performance</h4>
        <form  action="{{ route('hafazan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Add Student Hafazan Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Student</label>
                    <select class="form-control" name="student_ic" required />
                        <option value="">- choose -</option>
                        @foreach ($students as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="date" placeholder="Date" required />
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
                                        <th rowspan="2">Activity</th>
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
                                    </tr>
                                    <tr>
                                        <td>Talaqqi</td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_start_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_start_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_start_halaman" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_end_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_end_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="talaqi_end_halaman"required /></td>
                                    </tr>

                                    <tr>
                                        <td>New Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_start_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_start_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_start_halaman" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_end_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_end_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="hafazan_end_halaman" required /></td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <td>Repeat New Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_start_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_start_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_start_halaman" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_end_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_end_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_baru_end_halaman" required /></td>
                                    </tr>

                                    <tr>
                                        <td>Repeat Previous Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_start_juz" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_start_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_start_halaman" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_end_juz"required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_end_surah" required /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" name="ulangan_lama_end_halaman" required /></td>
                                    </tr>

                                    <tr>
                                        <td>Remark</td>
                                        <td colspan="3"><textarea name="remark" rows="5" class="form-control" placeholder="Please write your remark for student hafazan performance here..." required></textarea></td>
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
            <br />
            <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
            <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Submit</button>
        </form>
    </div>
</div>
@endsection
