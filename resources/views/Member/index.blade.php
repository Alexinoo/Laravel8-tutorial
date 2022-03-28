@extends('layouts.master')

@section('title', 'AJAX CRUD - DATATABLES')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Members
                        <a href="{{url('add-member')}}" class="btn btn-info float-end">Add Member</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                      <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $key => $value)
                                    <tr>
                                        <td>{{ $value->id}}</td>
                                        <td>{{ $value->name}}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            <a href="{{ url('edit-member/'. $value->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('delete-student/'. $value->id)}}" class="btn btn-danger">Delete</a>
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

$(function(){

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

     let table = $('.data-table').DataTable({
        serverSide : true ,
        processing : true ,
        ajax : "{{ route('members.index')}}",
        columns : [
                    { data : 'DT_RowIndex' , name : 'DT_RowIndex'},
                    { data : 'name' , name : 'name'},
                    { data : 'email' , name : 'email'},
                    { data : 'operations' , name : 'operations'},
            ]
    })
})

   
</script>
@endsection