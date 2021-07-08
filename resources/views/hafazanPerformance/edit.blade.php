@extends('layout.masterTeacherTahfiz')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Student Hafazan Performance</h4>
        <form action="{{ route('hafazan.update',$hafazan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Update Student Hafazan Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Student</label>
                    <select class="form-control" name="student_ic" />
                    <option value="">{{ $hafazan->student->name }}</option>

                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ $hafazan->date }}" placeholder="Date" />
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
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_start_juz" name="talaqi_start_juz" value="{{ $hafazan->talaqi_start_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_start_surah" name="talaqi_start_surah" value="{{ $hafazan->talaqi_start_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_start_halaman" name="talaqi_start_halaman" value="{{ $hafazan->talaqi_start_halaman }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_end_juz" name="talaqi_end_juz" value="{{ $hafazan->talaqi_end_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_end_surah" name="talaqi_end_surah" value="{{ $hafazan->talaqi_end_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="talaqi_end_halaman" name="talaqi_end_halaman" value="{{ $hafazan->talaqi_end_halaman }}" /></td>
                                    </tr>

                                    <tr>
                                        <td>New Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_start_juz" name="hafazan_start_juz" value="{{ $hafazan->hafazan_start_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_start_surah" name="hafazan_start_surah" value="{{ $hafazan->hafazan_start_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_start_halaman" name="hafazan_start_halaman" value="{{ $hafazan->hafazan_start_halaman }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_end_juz" name="hafazan_end_juz" value="{{ $hafazan->hafazan_end_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_end_surah" name="hafazan_end_surah" value="{{ $hafazan->hafazan_end_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="hafazan_end_halaman" name="hafazan_end_halaman" value="{{ $hafazan->hafazan_end_halaman }}" /></td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <td>Repeat New Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_start_juz" name="ulangan_baru_start_juz" value="{{ $hafazan->ulangan_baru_start_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_start_surah" name="ulangan_baru_start_surah" value="{{ $hafazan->ulangan_baru_start_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_start_halaman" name="ulangan_baru_start_halaman" value="{{ $hafazan->ulangan_baru_start_halaman }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_end_juz" name="ulangan_baru_end_juz" value="{{ $hafazan->ulangan_baru_end_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_end_surah" name="ulangan_baru_end_surah" value="{{ $hafazan->ulangan_baru_end_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_baru_end_halaman" name="ulangan_baru_end_halaman" value="{{ $hafazan->ulangan_baru_end_halaman }}" /></td>
                                    </tr>

                                    <tr>
                                        <td>Repeat Previous Hafazan</td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_start_juz" name="ulangan_lama_start_juz" value="{{ $hafazan->ulangan_lama_start_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_start_surah" name="ulangan_lama_start_surah" value="{{ $hafazan->ulangan_lama_start_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_start_halaman" name="ulangan_lama_start_halaman" value="{{ $hafazan->ulangan_lama_start_halaman }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_end_juz" name="ulangan_lama_end_juz" value="{{ $hafazan->ulangan_lama_end_juz }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_end_surah" name="ulangan_lama_end_surah" value="{{ $hafazan->ulangan_lama_end_surah }}" /></td>
                                        <td><input type="text" class="form-control" style="width:auto;" id ="ulangan_lama_end_halaman" name="ulangan_lama_end_halaman" value="{{ $hafazan->ulangan_lama_end_halaman }}" /></td>
                                    </tr>

                                    <tr>
                                        <td>Remark</td>
                                        <td colspan="3"><textarea name="remark" rows="5" class="form-control">{{ $hafazan->remark }}</textarea></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><br />
            <a href="{{ route('hafazan.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
            </a>
            <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Update</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
	<script>
    $(document).ready(function() {
			
			$('#talaqi_start_juz').keyup(increment)
			$('#talaqi_start_surah').keyup(increment1)
			$('#talaqi_start_halaman').keyup(increment2)
			$('#hafazan_start_juz').keyup(increment3)
			$('#hafazan_start_surah').keyup(increment4)
			$('#hafazan_start_halaman').keyup(increment5)
			$('#ulangan_baru_start_juz').keyup(increment6)
			$('#ulangan_baru_start_surah').keyup(increment7)
			$('#ulangan_baru_start_halaman').keyup(increment8)
			$('#ulangan_lama_start_juz').keyup(increment9)
			$('#ulangan_lama_start_surah').keyup(increment10)
			$('#ulangan_lama_start_halaman').keyup(increment11)
			
		function increment(e) {
			let start = $('#talaqi_start_juz').val() ? $('#talaqi_start_juz').val() : 0
          $('#talaqi_end_juz').val(start)
        }
		function increment1(e) {
			let start = $('#talaqi_start_surah').val() ? $('#talaqi_start_surah').val() : 0
          $('#talaqi_end_surah').val(start)
        }
		function increment2(e) {
			let start = $('#talaqi_start_halaman').val() ? $('#talaqi_start_halaman').val() : 0
          $('#talaqi_end_halaman').val(start)
        }
		function increment3(e) {
			let start = $('#hafazan_start_juz').val() ? $('#hafazan_start_juz').val() : 0
          $('#hafazan_end_juz').val(start)
        }
		function increment4(e) {
			let start = $('#hafazan_start_surah').val() ? $('#hafazan_start_surah').val() : 0
          $('#hafazan_end_surah').val(start)
        }
		function increment5(e) {
			let start = $('#hafazan_start_halaman').val() ? $('#hafazan_start_halaman').val() : 0
          $('#hafazan_end_halaman').val(start)
        }
		function increment6(e) {
			let start = $('#ulangan_baru_start_juz').val() ? $('#ulangan_baru_start_juz').val() : 0
          $('#ulangan_baru_end_juz').val(start)
        }
		function increment7(e) {
			let start = $('#ulangan_baru_start_surah').val() ? $('#ulangan_baru_start_surah').val() : 0
          $('#ulangan_baru_end_surah').val(start)
        }
		function increment8(e) {
			let start = $('#ulangan_baru_start_halaman').val() ? $('#ulangan_baru_start_halaman').val() : 0
          $('#ulangan_baru_end_halaman').val(start)
        }
		function increment9(e) {
			let start = $('#ulangan_lama_start_juz').val() ? $('#ulangan_lama_start_juz').val() : 0
          $('#ulangan_lama_end_juz').val(start)
        }
		function increment10(e) {
			let start = $('#ulangan_lama_start_surah').val() ? $('#ulangan_lama_start_surah').val() : 0
          $('#ulangan_lama_end_surah').val(start)
        }
		function increment11(e) {
			let start = $('#ulangan_lama_start_halaman').val() ? $('#ulangan_lama_start_halaman').val() : 0
          $('#ulangan_lama_end_halaman').val(start)
        }

		
		})
	</script>
@endpush