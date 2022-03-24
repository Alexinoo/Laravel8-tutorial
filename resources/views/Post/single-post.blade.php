   
   @extends('layouts.master')

  @section('title', 'DB CRUD OPERATIONS')

   @section('content')     
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Single Post details
                            <a href="{{url('post')}}" class="btn btn-info float-end">View All Posts</a>
                        </h5>
                    </div>
                    <div class="card-body">
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Title</th>
                                   <th>Body</th>
                               </tr>
                           </thead>
                           <tbody>
                                    <tr>
                                   <td>{{$post->id}}</td>
                                   <td>{{$post->title}}</td>
                                   <td>{{$post->body}}</td>
                               </tr>
                              
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection