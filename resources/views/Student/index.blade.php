@extends('layouts.master')

@section('title', 'Students')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Students
                        <a href="{{url('add-student')}}" class="btn btn-info float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg No</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $key => $value)
                                    <tr>
                                        <td>{{ $value->id}}</td>
                                        <td>{{ $value->regNo}}</td>
                                        <td>{{ $value->name}}</td>
                                        <td>{{ $value->course }}</td>
                                        <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ url('edit-student/'. $value->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('delete-student/'. $value->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                            
                            </tbody>
                        </table>
                    </div>
                </div>    
                <div class="float-end">
                    {{ $students->links() }}
                    </div>    
        </div>
    </div>
</div>    
@endsection


@section('scripts')

 <script>
  @if(Session::has('status'))
  toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                "positionClass" : 'toast-bottom-right'
            }
  		toastr.success("{{ session('status') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
    
@endsection