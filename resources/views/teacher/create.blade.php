@extends('layout.master')

@section('content')
    <div class="col-12 grid-margin">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Register Teacher</h4>
                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('teacher.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <p class="card-description text-primary">
                        <i class="mdi mdi-account-box"></i> Add Teacher Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="number" class="form-control" name="phone" required />
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender_id" class="form-control" required />
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
                            <input type="file" class="form-control" name="photo" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Teacher Type</label>
                            <select class="form-control" name="type" required />
                            <option value="">- choose type -</option>
                            <option value="Tahfiz">Tahfiz</option>
                            <option value="Academic">Academic</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Home Address</label>
                            <textarea class="form-control" name="address" rows="5" required></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="marriage_status" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" step="0.01" class="form-control" name="salary" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>IC No.</label>
                            <input type="number" class="form-control" name="ic_no" required />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>IC Attachment</label>
                            <input type="file" class="form-control" name="ic_attachment" required />
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
                            <input type="spouse_name" class="form-control" name="spouse_name" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="spouse_email" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="number" class="form-control" name="spouse_phone" />
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="spouse_occupation" />
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Workplace Address</label>
                            <textarea class="form-control" name="spouse_workplace_address" rows="5" ></textarea>
                        </div>
                        </div>
                    </div>

                    <hr />
                    <p class="card-description text-primary">
                        <i class="mdi mdi-lock"></i> Login Details
                    </p>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Teacher ID & Password</label><br />
                            <div class="badge badge-danger">ID & Password are equal to Teacher ID (auto generated)</div>
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
@endsection
