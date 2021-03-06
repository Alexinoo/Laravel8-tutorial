   
   @extends('layouts.master')


  @section('title', 'DB CRUD OPERATIONS')


   @section('content')   
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Add New Post
                            <a href="{{url('post')}}" class="btn btn-info float-end">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('post_created'))
                            <div class="alert alert-success">{{ Session::get('post_created')}}</div>
                        @endif
                        <form action="{{ url('post/store-post')}}" method="POST">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="title">Post Title</label>
                                <input type="title" name="title" id="title"  placeholder = "Enter post title" class="form-control">                              
                            </div>

                            <div class="form-group mb-3">
                                <label for="body">Post Body</label>
                              <textarea name="body" id="body"  rows="3" class="form-control" placeholder = "Enter post body" ></textarea>
                            </div>

                            <div class="form-group">
                             <input type="submit" value="Submit" class="btn btn-primary w-100"/>
                            </div>
                            
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
