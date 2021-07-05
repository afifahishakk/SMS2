@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Registration Fee</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('fee.update',$fee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Edit Registration Fee Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="fee_category_id"  />
                        {{-- <option value="">{{ $fee->fee_category_id }}</option>
                        @foreach ($fee_category as $item )
                          <option value="{{ $item->fee_category_id }}">{{ $item->fee_category }}</option>
                        @endforeach --}}
                        @foreach ($fee_category as $item )
                            <option value="{{ $item->fee_category_id }}" {{ $fee->fee_category_id == $item->fee_category_id ? 'selected' : ''}}>{{ $item->fee_category }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Type</label>
                      <input type="text" class="form-control" name="fee_type" value="{{ $fee->fee_type }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Fee</label>
                      <input type="number" class="form-control" name="fee_total" value="{{ $fee->fee_total }}" />
                  </div>
                </div>

              </div>
            <br />
            <a href="{{ route('fee.index') }}" class="btn btn-outline-dark">
                <i class="mdi mdi-keyboard-backspace"></i> Back
            </a>
            <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i>Update</button>
          </form>
        </div>
      </div>
</div>
@endsection
