@extends('layouts.master')

@section('title', 'Students')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
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
                   @foreach($students as $key => $value)                       
                   <tr>
                       <td>{{$value->id}}</td>
                       <td>{{$value->regNo}}</td>
                       <td>{{$value->name}}</td>
                       <td>{{$value->course}}</td>
                       <td>
                           <a href="{{ url('edit-student /'.$value->id)}}" class = "btn btn-primary btn-sm">Edit</a>
                           <a href="{{ url('delete-student/'.$value->id)}}" class = "btn btn-danger btn-sm">Delete</a>
                       </td>
                    </tr>
                    @endforeach
               </tbody>
           </table>
           {{ $students->links() }}
        </div>
    </div>
</div>
    
@endsection