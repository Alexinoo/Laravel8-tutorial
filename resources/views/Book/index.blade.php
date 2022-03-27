@extends('layouts.master')

@section('title', 'AJAX CRUD')

@section('content')

<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>     
      </div>
      <div class="modal-body">
              <ul id="errList"></ul>
           <div class="form-group mb-3">
               <label for="">ISBN</label>
               <input type="text"  class="form-control isbn"  name="isbn"/>
               <span id="errorIsbn"></span>
           </div>
           <div class="form-group mb-3">
               <label for="">Title</label>
               <input type="text"  class="form-control title"  name="title"/>
                <span id="errorTitle"></span>
           </div>
           <div class="form-group mb-3">
               <label for="">Author</label>
               <input type="text"  class="form-control author"  name="author" />
                <span id="errorAuthor"></span>
           </div>
           <div class="modal-footer mb-3">
                 <button type="button" class="btn btn-secondary  close_add_book " data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary  add_book">Save</button>
           </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="successMsg" class="mt-3"></div>
            <div class="card my-3">
                <div class="card-header text-center">
                    <h4>Books
                        <a class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#bookModal">Add Book</a>
                        <a class="btn btn-danger deleteAllSelectedRecords  mr-5 float-end">Delete All</a>
                    </h4>
                </div>
                <div class="card-body">                   
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id ="checkAll" name="ids[]" /></th>
                                    <th>Isbn</th>
                                    <th>Title</th>                                    
                                    <th>Author</th>                                   
                                    <th>Operations</th>                                    
                                </tr>
                            </thead>
                            <tbody>                                       
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
    $(document).ready(function(){     

        // FETCH BOOKS
        function fetchBook(){
              $.ajax({
                url : "fetch-books" ,
                type  : 'GET',
                dataType: "json",
                success : function(response){
                
                //EMPTY THE TBODY  FIRST - WHEN THE FUNCTION LOADS
                 $('tbody').html(" ");

                 //LOOP THROUGH THE ARRAY OF BOOKS
                 $.each(response.books , function(index , book){
                     $('tbody').append(`<tr id="sid${book.id}">
                                        <td><input type="checkbox" name="ids"  class="checkBoxClass" value="${book.id}" /></td>
                                        <td>${book.isbn}</td>
                                        <td>${book.title}</td>
                                        <td>${book.author}</td>
                                       <td>
                                        <button type="button" class="btn btn-primary btn-sm edit_book" value="${book.id}">Edit</button>

                                        <button type="button" class="btn btn-danger btn-sm delete_book" value="${book.id}">Delete</button>
                                        </td>
                                    </tr>`);
                 });
                }
            });
        }

        //Call the function
        fetchBook();

        //ADDING A BOOK

        // Grab the add_book click
        $(document).on('click','.add_book',function(e){
            e.preventDefault();

            let data = {
                "isbn" : $('.isbn').val(),
                "title" : $('.title').val(),
                "author" : $('.author').val(),
            }

              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url : "/books" ,
                type  : 'POST',
                data : data ,
                dataType: "json",
                success : function(response){

                    if(response.status == 404){       

                    //LOOP THROUGH THE ERROR LIST - Append output to <ul></ul>
                    // $.each(response.errors , function(index , error){
                    //      $('#errList').append(`<li>${error}</li>`);
                    // });    
                    
                    $('span').empty();       
            
                    //ERRORS ON INDIVIDUAL FIELD
                    if(response.errors.isbn){                           
                            $('#errorIsbn').addClass("text-danger");
                            $('#errorIsbn').append(`<p>${response.errors.isbn}</p>`);
                    }                      
                    if(response.errors.title){    
                            $('#errorTitle').addClass("text-danger");
                            $('#errorTitle').append(`<p>${response.errors.title}</p>`);
                    } 
                    if(response.errors.isbn){ 
                            $('#errorAuthor').addClass("text-danger");
                            $('#errorAuthor').append(`<p>${response.errors.author}</p>`);
                    } 
                    
                   
                    }else{
                          //EMPTY THE ERROR LIST
                           $('span').empty(); 
                           $('#successMsg').html("");                
                           $('#successMsg').addClass('alert alert-success');
                           $('#successMsg').text(response.message).fadeOut(4000); //Fade out after 4 sec

                           //HIDE MODAL
                           $('#bookModal').modal('hide');
                           //EMPTY THE INPUT FIELDS
                           $('#bookModal').find('input').val("");

                           //FETCH STUDENTS
                           fetchBook();

                    }
                  
                }
            });
            
        });

        $(document).on('click','.close_add_book',function(e){
            e.preventDefault();
             //REMOVES <p>errors</p>
             $('span').empty();                    
        })


        //DELETE SINGLE BOOK
          $(document).on('click','.delete_book',function(e){
            e.preventDefault();

            //GRAB the value
            let  id = $(this).val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(confirm('Are you sure you want to delete this record..?')){

                 $.ajax({
                url : `delete-book/${id} `,
                type  : 'POST',
                dataType: "json",
                success : function(response){
                     $('#successMsg').html("");
                     $('#successMsg').addClass('alert alert-success');
                     $('#successMsg').text(response.message).fadeOut(4000); //Fade out after 
                }
            }); 
            }

            fetchBook();
        });

        //DELETE MULTIPLE REORDS USING CHECKBOX
        //Grab on click
          $(document).on('click','#checkAll',function(){
         
            //Check All
             $('.checkBoxClass').prop('checked' , $(this).prop('checked'))

            //  on Click Delete All
             $('.deleteAllSelectedRecords').click(function(e){

                let allIds = [];

                if(allIds.length > 0){

                // loop through the selected checkboxes with $.each()
                $('input:checkbox[name=ids]:checked').each(function(){
                    allIds.push( $(this).val());
                });

                   $.ajaxSetup({
                         headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
              if(confirm('Are you sure you want to delete this record..?')){
                 $.ajax({
                url : `delete-batch/${allIds}`,
                type  : 'DELETE',
                dataType: "json",
                success : function(response){
                   $.each(allIds , function(index ,value ){
                       $('#sid'+value).remove();
                   })
                }
            }); 
        }
        fetchBook();
           }else{
               alert('No records selected/available for deletion..');
           }
     })

  }); 
});

</script>
    
@endsection