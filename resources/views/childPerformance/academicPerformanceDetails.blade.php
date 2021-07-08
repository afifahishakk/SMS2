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
                                @if($student->academic->count() > 0)
                                  <p>{{ $student->academic[0]->select('year')->groupBy('year')->first()->year }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table dataTable no-footer" role="grid">
                                      <thead>
                                        <tr class="table-primary">
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
                                      @if($student->academic->count() > 0)
                                        @foreach ($student->academic as $key=>$academic)
                                              @if($key % 2)
                                                <tr class="table-warning">
                                              @else
                                                <tr class="table-secondary">
                                              @endif
                                                <td>{{$academic->academic_type->a_type}}</td>
                                                <td>{{$academic->BM}}
                                                  @php
                                                    $grades = (
                                                    ($academic->BM >= 80) ? " (A)" :
                                                      (($academic->BM >= 65 && $academic->BM < 80) ? " (B)" :
                                                      (($academic->BM >= 50 && $academic->BM < 65) ? " (C)" :
                                                      (($academic->BM >= 30 && $academic->BM < 50) ? " (D)" :
                                                        (($academic->BM < 30) ? " (E)" : " (Not Valid)"))))
                                                    );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->BA}}
                                                  @php
                                                  $grades = (
                                                  ($academic->BA >= 80) ? " (A)" :
                                                    (($academic->BA >= 65 && $academic->BA < 80) ? " (B)" :
                                                    (($academic->BA >= 50 && $academic->BA < 65) ? " (C)" :
                                                    (($academic->BA >= 30 && $academic->BA < 50) ? " (D)" :
                                                      (($academic->BA < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->MM}}
                                                  @php
                                                  $grades = (
                                                  ($academic->MM >= 80) ? " (A)" :
                                                    (($academic->MM >= 65 && $academic->MM < 80) ? " (B)" :
                                                    (($academic->MM >= 50 && $academic->MM < 65) ? " (C)" :
                                                    (($academic->MM >= 30 && $academic->MM < 50) ? " (D)" :
                                                      (($academic->MM < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->SN}}
                                                  @php
                                                  $grades = (
                                                  ($academic->SN >= 80) ? " (A)" :
                                                    (($academic->SN >= 65 && $academic->SN < 80) ? " (B)" :
                                                    (($academic->SN >= 50 && $academic->SN < 65) ? " (C)" :
                                                    (($academic->SN >= 30 && $academic->SN < 50) ? " (D)" :
                                                      (($academic->SN < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->SEJ}}
                                                  @php
                                                  $grades = (
                                                  ($academic->SEJ >= 80) ? " (A)" :
                                                    (($academic->SEJ >= 65 && $academic->SEJ < 80) ? " (B)" :
                                                    (($academic->SEJ >= 50 && $academic->SEJ < 65) ? " (C)" :
                                                    (($academic->SEJ >= 30 && $academic->SEJ < 50) ? " (D)" :
                                                      (($academic->SEJ < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->PQS}}
                                                  @php
                                                  $grades = (
                                                  ($academic->PQS >= 80) ? " (A)" :
                                                    (($academic->PQS >= 65 && $academic->PQS < 80) ? " (B)" :
                                                    (($academic->PQS >= 50 && $academic->PQS < 65) ? " (C)" :
                                                    (($academic->PQS >= 30 && $academic->PQS < 50) ? " (D)" :
                                                      (($academic->PQS < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                                <td>{{$academic->PSI}}
                                                  @php
                                                  $grades = (
                                                  ($academic->PSI >= 80) ? " (A)" :
                                                    (($academic->PSI >= 65 && $academic->PSI < 80) ? " (B)" :
                                                    (($academic->PSI >= 50 && $academic->PSI < 65) ? " (C)" :
                                                    (($academic->PSI >= 30 && $academic->PSI < 50) ? " (D)" :
                                                      (($academic->PSI < 30) ? " (E)" : " (Not Valid)"))))
                                                  );
                                                  @endphp
                                                  {{$grades}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                          <tr>
                                            <td colspan="8" style="text-align: center">No Data</td>
                                          </tr>
                                        @endif
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
