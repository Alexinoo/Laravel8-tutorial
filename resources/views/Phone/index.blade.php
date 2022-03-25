@extends('layouts.master')

@section('title', 'Students')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Phone
                        <a href="{{url('add-phone')}}" class="btn btn-info float-end">Add Phone</a>
                    </h4>
                </div>
                <div class="card-body">
                   
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($phones as $key => $value)
                                    <tr>
                                        <td>{{ $value->id}}</td>
                                        <td>{{ $value->user->name}}</td>
                                        <td>{{ $value->phone_no}}</td>
                                    </tr>
                                @endforeach
                                            
                            </tbody>
                        </table>
                    </div>
                </div>    
         </div>
    </div>
</div>
    
@endsection