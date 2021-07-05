@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List of Montlhy Fee</h4>
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
                            <th> Year </th>
                            <th> Fee (RM) </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthlyFees as $monthlyfee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $monthlyfee->year }}</span></label></td>
                                <td>{{ $monthlyfee->fee }}</td>
                                <td>
                                    <form action="{{ route('monthlyFee.destroy',$monthlyfee->id) }}" method="POST">
                                        <a  href="{{ route('monthlyFee.edit',$monthlyfee->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

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
