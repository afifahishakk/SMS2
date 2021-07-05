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
                                <th>{{ $academic->a_type_id }}</th>
                                <td>{{ $academic->year }}</td>
                                <td>{{ $academic->BM }}</td>
                                <td>{{ $academic->BA }}</td>
                                <td>{{ $academic->MM }}</td>
                                <td>{{ $academic->SN }}</td>
                                <td>{{ $academic->SEJ }}</td>
                                <td>{{ $academic->PQS }}</td>
                                <td>{{ $academic->PSI }}</td>
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
