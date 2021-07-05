@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Announcement</h4>

          <form action="{{ route('announcement.update',$announcement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Announcement Details
            </p>
            <hr />
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{ $announcement->title }}" name="title"/>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" value="{{ $announcement->announcement_date }}" name="announcement_date" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label>Other Photo <span class="badge badge-warning">(if any)</span></label>
                    <input type="file" class="form-control" name="image"/>
                    <img src="/image/announcements/{{ $announcement->image }}" width="300px">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="7" >{{ $announcement->description }}</textarea>
                </div>
              </div>
            </div>
            <br />
            <a href="{{ route('announcement.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
            </a>
            <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i>Update</button>
          </form>
        </div>
      </div>
</div>
@endsection
