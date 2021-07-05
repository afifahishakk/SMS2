@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add New Announcement</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Add Announcement Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="announcement_date" required />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" class="form-control" name="image" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="7" required></textarea>
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
