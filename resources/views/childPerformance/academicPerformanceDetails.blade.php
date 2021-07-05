@extends('layout.masterParent')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">View Academic Performance</h4>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="student_ic" value="">
                    <p class="card-description text-primary">
                        <i class='menu-icon mdi mdi-book-open-page-variant'></i> View Academic Performance Details
                    </p>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Student</b></label>
                                <p>{{ $student->name }}</p>
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
                                <p>{{ $student->academic[0]->select('year')->groupBy('year')->first()->year }}</p>
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
                                        @foreach ($firstexams as $academic)
                                            <tr class="table-warning">
                                                <td>Penilaian Peperiksaan 1</td>
                                                <td>{{ $academic->BM }}</td>
                                                <td>{{ $academic->BA }}</td>
                                                <td>{{ $academic->MM }}</td>
                                                <td>{{ $academic->SN }}</td>
                                                <td>{{ $academic->SEJ }}</td>
                                                <td>{{ $academic->PQS }}</td>
                                                <td>{{ $academic->PSI }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($secondexams as $academic)
                                            <tr class="table-secondary">
                                                <td>Peperiksaan Pertengahan Tahun</td>
                                                <td>{{ $academic->BM }}</td>
                                                <td>{{ $academic->BA }}</td>
                                                <td>{{ $academic->MM }}</td>
                                                <td>{{ $academic->SN }}</td>
                                                <td>{{ $academic->SEJ }}</td>
                                                <td>{{ $academic->PQS }}</td>
                                                <td>{{ $academic->PSI }}</td>
                                            </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
