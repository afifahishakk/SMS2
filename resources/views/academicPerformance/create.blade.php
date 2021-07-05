@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Student Academic Performance</h4>
        <form action="{{ route('academic.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Add Academic Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Student</label>
                    <select class="form-control" name="student_ic"  />
                    <option value="">- choose student -</option>

                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Exam Type</label>
                    <select class="form-control" name="a_type_id"  />
                    <option value="">- choose exam -</option>
                    {{-- @foreach ($academic_types as $item )
                        <option value="{{ $item->id }}">{{ $item->a_type }}</option>
                    @endforeach --}}
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Bahasa Melayu</label>
                    <input type="text" class="form-control" name="BM"  placeholder="Keputusan Bahasa Melayu" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Bahasa Arab</label>
                    <input type="text" class="form-control" name="BA" placeholder="Keputusan Bahasa Arab" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Matematik</label>
                    <input type="text" class="form-control" name="MM"  placeholder="Keputusan Matematik" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Sains</label>
                    <input type="text" class="form-control" name="SN"  placeholder="Keputusan Sains" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Sejarah</label>
                    <input type="text" class="form-control" name="SEJ"placeholder="Keputusan Sejarah" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Pendidikan Quran Sunnah</label>
                    <input type="text" class="form-control" name="PQS"placeholder="Keputusan Pendidikan Quran Sunnah" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Pendidikan Syariah Islamiah</label>
                    <input type="text" class="form-control" name="PSI"  placeholder="Pendidikan Syariah Islamiah" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Year</label>
                    <select class="form-control" name="year" required />
                        <option value=''>- choose -</option>
                        <option value='2020'>2020</option>
                        <option value='2021'>2021</option>
                        <option value='2022'>2022</option>
                        <option value='2023'>2023</option>
                        <option value='2024'>2024</option>
                        <option value='2025'>2025</option>
                    </select>
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
