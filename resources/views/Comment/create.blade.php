   
   @extends('layouts.master')


  @section('title', 'Add Comment')


   @section('content')   
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Add Comment
                            <a href="{{url('comments')}}" class="btn btn-info float-end">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('status'))
                            <div class="alert alert-success">{{ Session::get('status')}}</div>
                        @endif
                        <form action="{{ url('store-comment')}}" method="POST">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="post_id">Post</label>
                            <select name="post_id" id="post_id" class="form-control">
                                @foreach($posts as $key => $value)
                                    <option value="{{$value->id}}">{{ $value->title }}</option>
                                @endforeach
                            </select>                      
                            </div>

                            <div class="form-group mb-3">
                                <label for="comment">Post comment</label>
                              <textarea name="comment" id="comment"  rows="3" class="form-control" placeholder = "Enter post comment" ></textarea>
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
