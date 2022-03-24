@extends('layouts.master')

@section('title', 'Students')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Students</h4>
                </div>
                <div class="card-body">
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg No</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for($i = 1; $i < count($students); $i++)
                                      <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$students[$i ] ['regNo']}}</td>
                                            <td>{{$students[$i ]['name'] }}</td>
                                            <td>{{$students[$i ]['course'] }}</td>
                                            <td>
                                                <a href="{{ url('edit-student /'.$students[$i ] ['id'])}}" class = "btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ url('delete-student/'.$students[$i ] ['id'])}}" class = "btn btn-danger btn-sm">Delete</a>
                                            </td>
                                    </tr>
                                @endfor                              
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