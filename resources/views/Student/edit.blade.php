@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Edit Student
                          <a href="{{url('students')}}" class="btn btn-info float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                
                    <form action="{{ url('update-student/'.$student->id)}}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="regNo">Regno</label>
                        <input type="text" name="regNo" id="regNo" class="form-control" value="{{$student->regNo}}"/>
                       @error('regNo')
                         <span class="text-danger">{{$message}}</span>                                    
                        @enderror
                        
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}"/>
                         @error('name')
                         <span class="text-danger">{{$message}}</span>                                    
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="course">Course</label>
                        <input type="text" name="course" id="course" class="form-control" value="{{$student->course}}"/>
                         @error('course')
                         <span class="text-danger">{{$message}}</span>                                    
                        @enderror
                    </div>

                     <div class="form-group mb-3">
                       <input type="submit" value="Submit" class="btn btn-success w-100" />
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection