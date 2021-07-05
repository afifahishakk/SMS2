@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Guardians</h4>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Photo </th>
                        <th> ID </th>
                        <th> Name </th>
                        <th> IC </th>
                        <th> Phone </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($guardians as $guardian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/image/guardians/{{ $guardian->photo }}" width="100px"></td>
                        <td>{{ $guardian->username }}</td>
                        <td>{{ $guardian->name }}</td>
                        <td>
                            <a href='#modal' data-toggle='modal' data-target="#detailsModal" data-id="{{ $guardian->id }}" title='view ic'>
                            view
                            </a>
                        </td>
                        <td>{{ $guardian->phone_no }}</td>
                        <td>{{ $guardian->email }}</td>
                        <td>
                            <button class='btn btn-primary btn-xs'>
                                @if(isset($guardian->user)){{ $guardian->user->Status }}@endif
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('guardian.destroy',$guardian->id) }}" method="POST">
                                <a  href="{{ route('guardian.edit',$guardian->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                @csrf
                                @method('DELETE')

                                <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-success"><i class="mdi mdi-account-card-details" style="font-size: 14px;"></i> IC Copy {{ $guardian->name }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="/image/guardianIC/'{{ $guardian->ic_attachment }}" class='img-fluid'>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
        </div>

        </div>
      </div>
    </div>
</div>
@endsection
