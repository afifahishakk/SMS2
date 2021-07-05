@extends('layout.master')

@section('content')
    <div class="col-12 grid-margin">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Profile</h4>
                <form method="POST" action=""  enctype="multipart/form-data">
                    @csrf
                    <p class="card-description text-primary">
                        <i class="mdi mdi-account-box"></i> Update Profile Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Admin ID</label>
                              <input type="text" class="form-control" name="username" value="{{ $admin->username }}" placeholder="Admin ID" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value="{{ $admin->name }}" placeholder="Name"  />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $admin->email }}" placeholder="Email Address"  />
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Phone No.</label>
                              <input type="number" class="form-control" name="phone" value="{{ $admin->phone }}" placeholder="Phone No."  />
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender_id" required />
                                    <option value="">- choose gender -</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>New Photo <span class="badge badge-warning">(if necessary)</span></label>
                              <input type="file" class="form-control" name="photo" placeholder="Photo" />
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Home Address</label>
                                <textarea class="form-control" name="address" rows="5" placeholder="Home Address" >{{ $admin->address }}</textarea>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Status</label>
                              <input type="text" class="form-control" name="marriage_status" value="{{ $admin->marriage_status }}" placeholder="Marriage Status"  />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Salary</label>
                              <input type="number" step="0.01" class="form-control" name="salary" value="{{ $admin->salary }}" placeholder="Salary"  />
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    IC No.
                                    <?php
                                        // echo "<a href='#modal' data-toggle='modal' data-target='#details$row[username]' title='view ic'>
                                        //         <span class='badge badge-success'>(View)</span>
                                        //     </a>";
                                    ?>
                                </label>
                                <input type="number" class="form-control" style="padding: 0.49rem 0.75rem;" name="ic_no" value="" placeholder="IC No."  />
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Reupload ic <span class="badge badge-warning">(if necessary)</span></label>
                              <input type="file" class="form-control" style="padding: 0.36rem 0.75rem;" name="ic_attachment" placeholder="IC Attachment" />
                          </div>
                        </div>
                    </div>
                    <hr />
                    <p class="card-description text-primary">
                    <i class="mdi mdi-heart"></i> Spouse Details <span class="badge badge-warning">(for status married only)</span>
                    </p>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Spouse Name</label>
                              <input type="spouse_name" class="form-control" name="spouse_name" value="{{ $admin->spouse_name }}" placeholder="Spouse Name" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="spouse_email" value="{{ $admin->spouse_email }}" placeholder="Email" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Phone No.</label>
                              <input type="number" class="form-control" name="spouse_phone" value="{{ $admin->spouse_phone }}" placeholder="Phone No." />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Occupation</label>
                              <input type="text" class="form-control" name="spouse_occupation" value="{{ $admin->spouse_occupation }}" placeholder="Spouse Occupation" />
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Workplace Address</label>
                                <textarea class="form-control" name="spouse_workplace_address" rows="5" placeholder="Workplace Address" >{{ $admin->spouse_workplace_address }}</textarea>
                            </div>
                        </div>
                      </div>

                    <br />
                    <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
