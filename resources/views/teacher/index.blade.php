@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Teacher</h4>
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
                            <th> Teacher </th>
                            <th> Name </th>
                            <th> IC No. </th>
                            <th> Type </th>
                            <th> Acc.<br />Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                    {{-- {{ dd($teachers[1]->user) }} --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="/image/teachers/{{ $teacher->photo }}" width="100px"></td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->ic_no }}</td>
                            <td>{{ $teacher->type }}</td>
                            <td><button class='btn btn-primary btn-xs'>
                                    @if(isset($teacher->user)){{ $teacher->user->Status }}@endif
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">
                                    <a href="{{ route('teacher.edit',$teacher->id) }}"><i class="mdi mdi-pencil-outline text-warning"></i></a>

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
