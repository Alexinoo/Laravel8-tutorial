@extends('layouts.master')

@section('title', 'File Upload')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>File Upload</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="file">File</label>
                            <input type="file"  required class="form-control" name="file" id="file"/>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" value="Submit" class="btn btn-primary w-100"/>
                        </div>
                    </form>
                    </div>
                </div>    
        </div>
    </div>
</div>
    
@endsection