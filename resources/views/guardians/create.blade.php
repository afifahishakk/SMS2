@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Register Parent</h4>

            <form method="post" action="/guardians" enctype="multipart/form-data">
                @csrf
              <p class="card-description text-primary">
                <i class="mdi mdi-account-box"></i> Add Parent Details
              </p>
              <hr />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Parent ID</label>
                      <input type="text" class="form-control" name="username" required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" required />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" required />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Phone No.</label>
                      <input type="number" class="form-control" name="phone_no" required />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender_id" required />
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
                      <label>Home Address</label>
                      <textarea class="form-control" name="address" rows="5" placeholder="Home Address" required></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Occupation</label>
                      <input type="text" class="form-control" name="occupation" required />
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
                      <label>Relationship</label>
                      <select class="form-control" name="relationship_id" required />
                        <option value="">- choose relationship -</option>
                        @foreach ($relationships as $item )
                            <option value="{{ $item->id }}">{{ $item->relationship }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>IC Attachment</label>
                      <input type="file" class="form-control" name="ic_attachment" placeholder="IC Attachment" required />
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
