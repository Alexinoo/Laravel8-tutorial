@extends('layouts.master')

@section('title', 'Resize Image')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Resize Image</h4>
                </div>
                <div class="card-body">
                       <form action="{{ url('resize-image')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="image"> Choose Image</label>
                        <input type="file" name="image" id="image" class="form-control" />                                
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