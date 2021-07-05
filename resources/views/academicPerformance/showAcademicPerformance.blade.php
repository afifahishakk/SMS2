@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Student Academic Performance</h4>
        <form action="{{ route('academic.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-book-open-page-variant'></i> View Academic Performance Details
            </p>
            <hr />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><b>Student</b></label>
                        <p>{{ $academic->student->name }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label></label>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label></label>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label><b>Year</b></label>
                        <p>{{ $academic->year }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table dataTable no-footer" role="grid">
                                <thead>
                                <tr class="table-primary" style="text-align:center;">
                                    <th>Exam Type</th>
                                    <th>BM</th>
                                    <th>BA</th>
                                    <th>MM</th>
                                    <th>SN</th>
                                    <th>SEJ</th>
                                    <th>PQS</th>
                                    <th>PSI</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr class="table-warning">
                                        <td>Penilaian Peperiksaan 1</td>
                                        <td>BM</td>
                                        <td>BA</td>
                                        <td>MM</td>
                                        <td>SN</td>
                                        <td>SEJ</td>
                                        <td>PQS</td>
                                        <td>PSI</td>
                                    </tr>

                                    <tr class="table-secondary">
                                        <td>Peperiksaan Pertengahan Tahun</td>
                                        <td>BM</td>
                                        <td>BA</td>
                                        <td>MM</td>
                                        <td>SN</td>
                                        <td>SEJ</td>
                                        <td>PQS</td>
                                        <td>PSI</td>
                                    </tr>

                                    <tr class="table-warning">
                                        <td>Peperiksaan Percubaan</td>
                                        <td>BM</td>
                                        <td>BA</td>
                                        <td>MM</td>
                                        <td>SN</td>
                                        <td>SEJ</td>
                                        <td>PQS</td>
                                        <td>PSI</td>
                                    </tr>


                                    <tr class="table-secondary">
                                        <td>Peperiksaan Akhir Tahun</td>
                                        <td>BM</td>
                                        <td>BA</td>
                                        <td>MM</td>
                                        <td>SN</td>
                                        <td>SEJ</td>
                                        <td>PQS</td>
                                        <td>PSI</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class='container-fluid w-100'>
                <a onclick="window.print()" target="_blank" class='btn btn-primary float-left mt-4'>
                    <i class='mdi mdi-printer mr-1'></i>Print
                </a>
            </div>
            <br />
        </form>
    </div>
</div>
@endsection
