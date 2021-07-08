@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Student Enrollment Form</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Student Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Student IC</label>
                        <input type="number" class="form-control" name="ic_no"  required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"  required />
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>D.O.B</label>
                      <input type="date" class="form-control" name="dob"  required />
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gender_id" required>
                        <option value="">- choose gender -</option>
                        @foreach ($genders as $item )
                          <option value="{{ $item->id }}">{{ $item->gender }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo" placeholder="Photo" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="address" rows="5" placeholder="Home address" required></textarea>
                  </div>
                </div>
            </div>
            <p class="card-description text-primary">
                <i class="mdi mdi-attachment"></i> IC Attachment
            </p>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Copy of Student IC</label><br />
                      <input type="file" class="form-control" name="ic_copy" placeholder="IC Copy" required />
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Parent</label><br />
                      <select class="form-control" name="parent" required />
                        <option value="">- choose parent -</option>
                        @foreach ($guardians as $item )
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
            </div>
            <hr />
            <p class="card-description text-primary">
                <i class="mdi mdi-check-circle"></i> Registration Purpose
            </p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-check form-check-warning">
                            <input type="radio" name="purpose" value="Tahfiz">
                            <label for="Tahfiz">Tahfiz</label>
                        </div>
                    </div>
                    </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-check form-check-warning">
                            <input type="radio" name="purpose" value="SPM">
                            <label for="SPM">SPM</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                            <div class="form-check form-check-warning">
                                <input type="radio" name="purpose" value="Both">
                                <label for="Both">Both</label>
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
</div>
@endsection
