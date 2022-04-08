@extends('layouts.master')

@section('title', 'Image CRUD')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">           
            <div class="card mt-5">              
                <div class="card-header">
                    <h5>Add Worker
                           <a href="{{route('all.workers')}}" class="btn btn-info float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body">                     
                    <form action="{{ route('worker.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="" class="form-control" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Choose Profile Image</label>
                            <input type="file" name="file" id="" class="form-control" onchange="previewFile(this)" />
                            <img src="" alt="profile image" id="previewImg"   style="max-width:200px;height:190px;margin-top:20px;" />
                        </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

@if(Session::has('worker_added'))
    swal("Great Job","{{ Session::get('worker_added') }}","success",{
        button : "OK",
    })  
@endif

</script>
    
@endsection