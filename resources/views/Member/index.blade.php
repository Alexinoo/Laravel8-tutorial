@extends('layouts.master')

@section('title', 'AJAX CRUD - DATATABLES')

@section('content')
<!-- Modal -->
<div class="modal fade" id="ajaxModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeading"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="" id="memberForm" name="memberForm" class="form-horizontal">
           <input type="hidden" name="member_id" id="member_id" />
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="" placeholder="Enter Name">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="">
            </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBtn" value="Create">Save </button>
      </div>
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Members</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                            <a href="javascript:void(0)" class="btn btn-info float-end" id="createNewMember">Add Member</a>
                    </div>
                   
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
    });

    //ADD MEMBER FUNCTIONALITY
    $('#createNewMember').click(function(){
             $('#member_id').val(' ');
             $('#memberForm')[0].reset();
             $('#modalHeading').html('Add Member');
             $('#ajaxModal').modal('show');

    });

    // on asve click
      $('#saveBtn').click(function(e){
          e.preventDefault();
          $(this).html('Save');

            $.ajax({
                url : "{{ route('members.store')}}" ,
                data :  $('#memberForm').serialize() ,
                type : 'POST',
                datType : 'json',
                success : function(response){

                      $('#memberForm')[0].reset();
                      $('#ajaxModal').modal('hide');
                      table.draw();
                },
                error : function(error){
                    console.log('Error :' ,error);
                     $('#saveBtn').html('Save');
                }
            })

       });
})

   
</script>
@endsection