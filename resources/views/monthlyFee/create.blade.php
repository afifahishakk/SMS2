@extends('layout.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Record Monthly Fee</h4>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

          <form action="{{ route('monthlyFee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class="mdi mdi-cookie"></i> Record Monthly Fee
            </p>
            <hr />
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Fee</label>
                      <input type="number" class="form-control" name="fee" placeholder="Fee" required />
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Year</label>
                        <select class='form-control' style='width: 100%;' name='year' required>
                            <option value=''>- choose year -</option>
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
            <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
            <button type="submit" name="submit" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Submit</button>
          </form>
        </div>
      </div>
</div>
@endsection
