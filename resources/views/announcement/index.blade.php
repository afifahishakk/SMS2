@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Announcement</h4>
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
                            <th> Photo </th>
                            <th> ID </th>
                            <th> Date </th>
                            <th> Title </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <td><img src="/image/announcements/{{ $announcement->image }}" width="100px"></td>
                            <td><label class='badge badge-primary'>{{ $announcement->announcement_id }}</label></td>
                            <td>{{ $announcement->announcement_date }}</td>
                            <td>{{ $announcement->title }}</td>
                            <td>
                                <form action="{{ route('announcement.destroy',$announcement->id) }}" method="POST">
                                    <a  href="{{ route('announcement.edit',$announcement->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

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
