@extends('layouts.master')

@section('title', 'Employee')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-3">
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Add Employee
                        <a href="{{ url('employees') }}" class="btn btn-info float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('store-employee')}}" method="POST" >
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Salary</label>
                        <input type="text" class="form-control" name="salary" placeholder="Enter salary" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Department</label>
                      <select name="department" id="" class="form-control">
                          <option value="HR">HR</option>
                          <option value="ICT">ICT</option>
                          <option value="ADMIN">ADMIN</option>
                      </select>
                    </div>
                     <div class="form-group mb-3">
                      <input type="submit" value="Submit" class="btn btn-primary w-100">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection