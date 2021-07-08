@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Student Academic Performance</h4>
        <form action="{{ route('academic.update',$academic->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> Update Academic Performance Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Student</label>
                    <select class="form-control" name="student_id">
                    <option value="{{ $academic->student_id }}">{{ $academic->student->name }}</option>
                      @foreach ($students as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Exam Type</label>
                    <select class="form-control" name="a_type_id">
                    <option value="{{ $academic->a_type_id }}">{{ $academic->academic_type->a_type }}</option>
                    @foreach ($academic_types as $item )
                        <option value="{{ $item->id }}">{{ $item->a_type }}</option>
                    @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Bahasa Melayu</label>
                    <input type="text" class="form-control" name="BM" value="{{ $academic->BM }}"  placeholder="Keputusan Bahasa Melayu" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Bahasa Arab</label>
                    <input type="text" class="form-control" name="BA" value="{{ $academic->BA }}" placeholder="Keputusan Bahasa Arab" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Matematik</label>
                    <input type="text" class="form-control" name="MM" value="{{ $academic->MM }}" placeholder="Keputusan Matematik" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Sains</label>
                    <input type="text" class="form-control" name="SN" value="{{ $academic->SN }}" placeholder="Keputusan Sains" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Sejarah</label>
                    <input type="text" class="form-control" name="SEJ" value="{{ $academic->SEJ }}" placeholder="Keputusan Sejarah" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Pendidikan Quran Sunnah</label>
                    <input type="text" class="form-control" name="PQS" value="{{ $academic->PQS }}" placeholder="Keputusan Pendidikan Quran Sunnah" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Pendidikan Syariah Islamiah</label>
                    <input type="text" class="form-control" name="PSI" value="{{ $academic->PSI }}" placeholder="Pendidikan Syariah Islamiah" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Year</label>
                    <select class="form-control" name="year" />
                        <option value="{{ $academic->year }}">{{ $academic->year }}</option>
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
            <a href="{{ route('academic.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
            </a>
            <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Update</button>
        </form>
    </div>
</div>
@endsection
