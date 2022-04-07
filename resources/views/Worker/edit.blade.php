@extends('layouts.master')

@section('title', 'Image CRUD')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">           
            <div class="card mt-5">              
                <div class="card-header">
                    <h5>Edit Worker
                           <a href="{{route('all.workers')}}" class="btn btn-info float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body">
                       @if(session()->has('worker_updated'))
                        <div class="alert alert-success" role="alert">{{session('worker_updated')}}</div>
                    @endif
                    <form action="{{ route('worker.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$worker->id}}">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" class="form-control"  value="{{ $worker->name}}"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Choose Profile Image</label>
                            <input type="file" name="file" id="file" class="form-control" onchange="previewFile(this)" />
                            <img alt="profile image" id="previewImg"  style="max-width:200px;height:100px;margin-top:20px;" src="{{asset('images/'.$worker->profile_image)}}" />
                        </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewFile(){
        let file = $('input[type=file]').get(0).files[0]

        if(file){
            var reader = new FileReader();
            reader.onload = function () {
                $('#previewImg').attr("src",reader.result)
            }
            reader.readAsDataURL(file)
        }
    }
</script>
    
@endsection