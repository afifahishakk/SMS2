@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Registration Fee</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('fee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Add Registration Fee Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="fee_category_id" required />
                        <option value="">- choose category -</option>
                        @foreach ($fee_category as $item )
                          <option value="{{ $item->fee_category_id }}">{{ $item->fee_category }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Type</label>
                      <input type="text" class="form-control" name="fee_type" placeholder="Fee Type" required />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Fee</label>
                      <input type="number" class="form-control" name="fee_total" placeholder="Fee Total" required />
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
