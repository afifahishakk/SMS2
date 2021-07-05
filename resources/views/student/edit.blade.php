@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Student Enrollment Form</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('student.update',$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <p class="card-description text-primary">
                <i class='menu-icon mdi mdi-verified'></i> Terms & Condition
            </p>
            <hr />
            <ul class="list-star text-danger">
                <li>Open for children ages 7 and above.</li>
                <li>Please make sure all fields are filled in correctly.</li>
                <li>After received your application, we will issue an Acceptance / Reject to the parents / guardians of the child involved.</li>
            </ul>
            <br />
            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Student Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>IC/Passport (eg: 032012015482)</label>
                        <input type="number" class="form-control" name="ic_no"  value="{{ $student->ic_no }}" readonly/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"  value="{{ $student->name }}" />
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>D.O.B</label>
                      <input type="date" class="form-control" name="dob"  value="{{ $student->dob }}" />
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gender_id"  />
                      @foreach ($genders as $item )
                        <option value="{{ $item->id }}" {{ $student->gender_id == $item->id ? 'selected' : ''}}>{{ $item->gender }}</option>
                      @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>New Photo  <span class="badge badge-warning">(if necessary)</span></label>
                        <input type="file" class="form-control" name="photo" placeholder="Photo"  />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="address" rows="5" placeholder="Home address" >{{ $student->address }}</textarea>
                  </div>
                </div>
            </div>
            <p class="card-description text-primary">
                <i class="mdi mdi-attachment"></i> IC/Passport Attachment
            </p>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Reupload Copy of Student IC/Passport <span class="badge badge-warning">(if necessary)</span></label>
                      <input type="file" class="form-control" name="ic_copy" placeholder="IC Copy"  />
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
                            {{-- {{ dd($student->purpose) }} --}}
                                <input type="radio" name="purpose" value="Tahfiz" {{ $student->purpose == 'Tahfiz' ? 'checked' : ''}}>
                                <label for="Tahfiz">Tahfiz</label>
                        </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <div class="form-check form-check-warning">
                            <input type="radio" name="purpose" value="SPM" {{ $student->purpose == 'SPM' ? 'checked' : ''}}>
                            <label for="SPM">SPM</label>
                        </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <div class="form-check form-check-warning">
                            <input type="radio" name="purpose" value="Both" {{ $student->purpose == 'Both' ? 'checked' : ''}}>
                            <label for="Both">Both</label>
                        </div>
                  </div>
                </div>
            </div>
            <br />
            <a href="{{ route('student.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
                </a>
            <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i>Update</button>
          </form>
        </div>
      </div>
</div>
@endsection
