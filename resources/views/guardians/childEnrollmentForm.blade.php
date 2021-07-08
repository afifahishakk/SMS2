@extends('layout.masterParent')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Enrollment Form</h4>
                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('parents.storeChild') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="class_id" value="" />
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
                        <i class='menu-icon mdi mdi-account-box'></i> Children Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>IC/Passport (eg: 032012015482)</label>
                              <input type="number" class="form-control" name="ic_no" value="" placeholder="Children IC" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="" placeholder="Children Name" required />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>D.O.B</label>
                              <input type="date" class="form-control" name="dob" value="" placeholder="Children D.O.B" required />
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
                    <hr />
                    <p class="card-description text-primary">
                        <i class="mdi mdi-attachment"></i> IC/Passport Attachment
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Copy of Children IC/Passport</label><br />
                                <input type="file" class="form-control" name="ic_copy" placeholder="IC Copy" required />
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
                    <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
