@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List of Registration Fee</h4>
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
                            <th> No. </th>
                            <th> Category </th>
                            <th> Type </th>
                            <th> Fee (RM) </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fees as $fee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class='badge badge-primary'>{{ $fee->fee_category_id }}</span></label></td>
                                <td>{{ $fee->fee_type }}</td>
                                <td>{{ $fee->fee_total }}</td>
                                <td>
                                    <form action="{{ route('fee.destroy',$fee->id) }}" method="POST">
                                        <a  href="{{ route('fee.edit',$fee->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                        @csrf
                                        @method('DELETE')

                                        <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                                    </form>
                                    {{-- <button type="button" class="btn btn-icons btn-inverse-warning">
                                        <i class="mdi mdi-pencil-outline"></i>
                                    </button>
                                    <button type="button" class="btn btn-icons btn-inverse-danger">
                                        <i class="mdi mdi-delete-outline"></i>
                                    </button> --}}
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
