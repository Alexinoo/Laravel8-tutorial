@extends('layouts.master')

@section('title', 'Tinymce WYSWIG EDITOR')
   
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
             <div class="card mt-5">
                 <div class="card-header">
                     <h5>Tinymce WYSWIG EDITOR</h5>
                 </div>
                 <div class="card-body">
                     @csrf
                        <div class="form-group mb-3">
                            <textarea name="description" id="description"  rows="3" class="form-control"></textarea>
                        </div>
                 </div>
             </div>
        </div>
     
    </div>
</div>
    
@endsection

@section('scripts')
<script>
    tinymce.init({
      selector: 'textarea',    
    });
</script>
  
@endsection

