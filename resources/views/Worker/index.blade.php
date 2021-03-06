@extends('layouts.master')

@section('title', 'Image CRUD')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">           
            <div class="card mt-5">              
                <div class="card-header">
                    <h5>All Workers
                        <a href="{{url('add-worker')}}" class="btn btn-info float-end">Add Worker</a>
                    </h5>
                </div>
                <div class="card-body">                   
                     <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Profile Image</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @php($i = 1)
                             @foreach($workers as $key => $worker)
                             <tr>
                                 <td>{{$i++}}</td>
                                 <td>{{$worker->name}}</td>
                                 <td><img src="{{ asset('images/'. $worker->profile_image)}}" alt="profile img" style="max-width:60px;height:50px"></td>
                                 <td>
                                     <a href="{{url('edit-worker/'.$worker->id)}}" class="btn btn-info btn-sm">Edit</a>
                                     <a href="{{url('delete-worker/'.$worker->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this worker..?')">Delete</a>
                                 </td>
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

@section('scripts')
<script>  
@if(Session::has('worker_deleted'))
    swal("Great Job","{{ Session::get('worker_deleted') }}","success",{
        button : "OK",
    })  
@endif
</script>
    
@endsection