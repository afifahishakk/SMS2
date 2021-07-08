@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Manage Academic Performance</h4>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length">
                            <label>

                                Show<select name="datatable_length" aria-controls="datatable" class="form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>

                                entries
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                <table id="datatable" class="table dataTable no-footer" role="grid">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Name</th>
                            <th>Exam</th>
                            <th>Year</th>
                            <th>BM</th>
                            <th>BA</th>
                            <th>MM</th>
                            <th>SN</th>
                            <th>SEJ</th>
                            <th>PQS</th>
                            <th>PSI</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($academics as $academic)
                            <tr>
                                <td><img src="/image/students/{{ $academic->student->photo }}" width="100px"></td>
                                <td>{{ $academic->student->name }}</td>
                                <th>{{ $academic->academic_type->a_type }}</th>
                                <td>{{ $academic->year }}</td>
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
                                <td>
                                    <form action="{{ route('academic.destroy',$academic->id) }}" method="POST">
                                        <a  href="{{ route('academic.edit',$academic->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
