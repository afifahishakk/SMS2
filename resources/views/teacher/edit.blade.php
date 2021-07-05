@extends('layout.master')

@section('content')
    <div class="col-12 grid-margin">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Teacher</h4>
                <form method="POST" action="{{ route('teacher.update',$teacher->id) }}"  enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <p class="card-description text-primary">
                        <i class="mdi mdi-account-box"></i> Update Teacher Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>TeacherID</label>
                            <input type="text" class="form-control" name="username" value="{{ $teacher->username }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $teacher->name }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $teacher->email }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="number" class="form-control" name="phone" value="{{ $teacher->phone }}" />
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender_id" class="form-control"  />
                            {{-- <option value="">{{ $teacher->gender_id }}</option> --}}
                            @foreach ($genders as $item )
                            <option value="{{ $item->id }}" {{ $teacher->gender_id == $item->id ? 'selected' : ''}}>{{ $item->gender }}</option>

                            @endforeach

                            </select>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" name="photo" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Teacher Type</label>
                            <select class="form-control" name="type"  />
                            <option value="{{ $teacher->type }}">{{ $teacher->type }}</option>
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
                            <textarea class="form-control" name="address" rows="5" >{{ $teacher->address }}</textarea>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" name="marriage_status" value="{{ $teacher->marriage_status }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" step="0.01" class="form-control" name="salary" value="{{ $teacher->salary }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>IC No.</label>
                            <input type="number" class="form-control" name="ic_no"  value="{{ $teacher->ic_no }}"/>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>IC Attachment</label>
                            <input type="file" class="form-control" name="ic_attachment" />
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
                            <input type="spouse_name" class="form-control" name="spouse_name" value="{{ $teacher->spouse_name }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="spouse_email" value="{{ $teacher->spouse_email }}" />
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="number" class="form-control" name="spouse_phone"  value="{{ $teacher->spouse_phone }}"/>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" class="form-control" name="spouse_occupation" value="{{ $teacher->spouse_occupation }}"/>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Workplace Address</label>
                            <textarea class="form-control" name="spouse_workplace" rows="5" >{{ $teacher->spouse_workplace }}</textarea>
                        </div>
                        </div>
                    </div>
                    <br />
                    <a href="{{ route('teacher.index') }}" class="btn btn-outline-dark">
                        <i class="mdi mdi-keyboard-backspace"></i> Back
                    </a>
                    <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
