@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Parent</h4>

            <form method="post" action="/guardians/{{ $guardian->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <p class="card-description text-primary">
                <i class="mdi mdi-account-box"></i> Update Parent Details
              </p>
              <hr />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Parent ID</label>
                      <input type="text" class="form-control" value="{{ $guardian->username }}" name="username" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ $guardian->name }}" name="name" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" value="{{ $guardian->email }}" name="email" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Phone No.</label>
                      <input type="number" class="form-control" value="{{ $guardian->phone_no }}" name="phone_no" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender_id" />
                            @foreach ($genders as $item )
                            <option value="{{ $item->id }}" {{ $guardian->gender_id == $item->id ? 'selected' : ''}}>{{ $item->gender }}</option>
                            @endforeach
                        </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>New Photo <span class="badge badge-warning">(if any)</span></label>
                      <input type="file" class="form-control" name="photo" placeholder="Photo" />
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Home Address</label>
                      <textarea class="form-control" name="address" rows="5" value="{{ $guardian->address }}" placeholder="Home Address">{{ $guardian->address }}</textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Occupation</label>
                      <input type="text" class="form-control" value="{{ $guardian->occupation }}" name="occupation" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Salary</label>
                      <input type="number" step="0.01" class="form-control" value="{{ $guardian->salary }}" name="salary" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Relationship</label>
                      <select class="form-control" name="relationship_id" />
                        @foreach ($relationships as $item )
                        <option value="{{ $item->id }}" {{ $guardian->relationship_id == $item->id ? 'selected' : ''}}>{{ $item->relationship }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Reupload IC <span class="badge badge-warning">(if necessary)</span></label>
                      <input type="file" class="form-control" name="ic_attachment" placeholder="IC Attachment" />
                  </div>
                </div>
              </div>
              <br />
              <a href="{{ route('guardian.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
                </a>
            <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i>Update</button>
          </form>
        </div>
      </div>
</div>
@endsection
