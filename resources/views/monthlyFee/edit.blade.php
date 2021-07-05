@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Monthly Fee</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('monthlyFee.update',$monthlyFee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Update Monthly Fee Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Fee</label>
                      <input type="text" class="form-control" name="fee_type" value="{{ $monthlyFee->fee }}" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Year</label>
                      <select class='form-control' style='width: 100%;' name='year' required>
                        <option value='{{ $monthlyFee->id }}'>{{ $monthlyFee->year }}</option>
                        <option value='2020'>2020</option>
                        <option value='2021'>2021</option>
                        <option value='2022'>2022</option>
                        <option value='2023'>2023</option>
                        <option value='2024'>2024</option>
                        <option value='2025'>2025</option>
                    </select>
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
