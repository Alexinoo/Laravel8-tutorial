@extends('layouts.master')

@section('title', 'Resize Image')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Dropzone File Upload</h4>
                </div>
                <div class="card-body">
                       <form action="{{ url('dropzone')}}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                    @csrf
                    <div class="">
                        <h3 class="text-center"> Upload Image by click on box</h3>
                    </div>

                    <div class="dz-default dz-message">
                        <span> Drop files here to upload</span>
                    </div>

                    </form>
                    </div>
                </div>    
         </div>
    </div>
</div>
    
@endsection