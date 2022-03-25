@extends('layouts.master')

@section('title', 'Students')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Comment
                        <a href="{{url('add-comment')}}" class="btn btn-info float-end">Add Comment</a>
                    </h4>
                </div>
                <div class="card-body">
                   
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post</th>
                                    <th>Comment</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $key => $value)
                                    <tr>
                                        <td>{{ $value->id}}</td>
                                        <td>{{ $value->post->body}}</td>
                                        <td>{{ $value->comment}}</td>
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