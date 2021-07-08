@extends('layout.masterTeacherAcademic')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">View Academic Performance</h4>
        <div class="table-responsive">
          <table id="datatable" class="table dataTable no-footer" role="grid">
            <thead>
              <tr>
                <th>Student</th>
                <th>Name</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td><img src="/image/students/{{ $student->photo }}" width="100px"></td>
                        <td>{{ $student->name }}</td>
                        <td>
                          @if($student->academic->count() > 0)
                            @foreach($student->academic as $academic)
                              @php
                                  $year =[];
                                  $year[$academic->year] = $academic->year;
                              @endphp
                            @endforeach
                            {{implode('', $year)}}
                          @else
                          Year
                          @endif
                          
                        </td>
                        <td>
                            {{-- <form action="" method="POST">
                                <a  href=""><i class="mdi mdi-pencil-outline text-warning"></i></a>

                                @csrf
                                @method('DELETE')

                                <button  class="btn btn-icons" type="submit"><i class="mdi mdi-delete-outline text-danger"></i></button>
                            </form> --}}
                            <a href="{{ route('academic.show',$student->id) }}" data-toggle='tooltip' data-placement='left' title='View'>
                                <i class='mdi mdi-comment-text-outline text-primary'></i>
                            </a>
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
