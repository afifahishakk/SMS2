@extends('layout.master')

@section('content')

<div class='row'>
    <div class='col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card'>
      <div class='card card-statistics'>
        <div class='card-body'>
          <div class='clearfix'>
            <div class='float-left'>
              <i class='mdi mdi-google-wallet text-success icon-lg'></i>
            </div>
            <div class='float-right'>
              <p class='mb-0 text-right'>Paid Fees</p>
              <div class='fluid-container'>
                <h3 class='font-weight-medium text-right mb-0'>RM</h3>
              </div>
            </div>
          </div>
          <p class='text-muted mt-3 mb-0'>
            <i class='mdi mdi-information mr-1' aria-hidden='true'></i> Total Paid Fees
          </p>
        </div>
      </div>
    </div>
    <div class='col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card'>
      <div class='card card-statistics'>
        <div class='card-body'>
          <div class='clearfix'>
            <div class='float-left'>
              <i class='mdi mdi-account-box text-primary icon-lg'></i>
            </div>
            <div class='float-right'>
              <p class='mb-0 text-right'>Teacher</p>
              <div class='fluid-container'>
                <h3 class='font-weight-medium text-right mb-0'></h3>
              </div>
            </div>
          </div>
          <p class='text-muted mt-3 mb-0'>
            <i class='mdi mdi-information mr-1' aria-hidden='true'></i> Total Active Teacher
          </p>
        </div>
      </div>
    </div>
    <div class='col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card'>
      <div class='card card-statistics'>
        <div class='card-body'>
          <div class='clearfix'>
            <div class='float-left'>
              <i class='mdi mdi-account-multiple text-danger icon-lg'></i>
            </div>
            <div class='float-right'>
              <p class='mb-0 text-right'>Parent</p>
              <div class='fluid-container'>
                <h3 class='font-weight-medium text-right mb-0'></h3>
              </div>
            </div>
          </div>
          <p class='text-muted mt-3 mb-0'>
            <i class='mdi mdi-information mr-1' aria-hidden='true'></i> Total Active Parent
          </p>
        </div>
      </div>
    </div>
    <div class='col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card'>
      <div class='card card-statistics'>
        <div class='card-body'>
          <div class='clearfix'>
            <div class='float-left'>
              <i class='mdi mdi-kodi text-warning icon-lg'></i>
            </div>
            <div class='float-right'>
              <p class='mb-0 text-right'>Enrollment</p>
              <div class='fluid-container'>
                <h3 class='font-weight-medium text-right mb-0'></h3>
              </div>
            </div>
          </div>
          <p class='text-muted mt-3 mb-0'>
            <i class='mdi mdi-information mr-1' aria-hidden='true'></i> Approved Enrollment
          </p>
        </div>
      </div>
    </div>
</div>
<div class='row'>
    <div class='col-lg-12 grid-margin'>
          <div class='card'>
            <div class='card-body'>
                  <h4 class='card-title'>Registration Fees Payment</h4>
                 <div class='table-responsive'>
                    <table id='datatable' class='table dataTable no-footer' role='grid'>
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Date</th>
                              <th>Student</th>
                              <th>Pay./ Details</th>
                              <th>Option</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-lg-12 grid-margin'>
          <div class='card'>
            <div class='card-body'>
                  <h4 class='card-title'>{{ now()->format('F Y') }} Monthly Fees Payment</h4>
                  <div class='table-responsive'>
                    <table id='datatable2' class='table dataTable no-footer' role='grid'>
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Date</th>
                              <th>Student</th>
                              <th>Pay./ Details</th>
                              <th>Month/Year</th>
                              <th>Option</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                    </table>
                  </div>
            </div>
          </div>
    </div>
  </div>
@endsection
