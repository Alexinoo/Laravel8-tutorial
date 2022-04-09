@extends('layouts.master')

@section('title', 'Employees')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Employees
                        <a href="{{url('add-employee')}}" class="btn btn-info float-end">Add Employee</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-rensponsive">                 
                      <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Salary</th>
                                    <th>Department</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($employees as $key => $value)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->salary }}</td>
                                        <td>{{ $value->department }}</td>
                                        <td>
                                           
                                            <a href="{{ url('export-excel')}}" class="btn btn-success">Excel</a>
                                            <a href="{{ url('export-csv')}}" class="btn btn-info">CSV</a>
                                         
                                        </td>
                                    </tr>
                                @endforeach
                                            
                            </tbody>
                        </table>
                    </div>
                  </div>
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