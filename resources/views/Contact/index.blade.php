@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h5>Contact Us</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('send-message')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="msg">Message</label>
                      <textarea name="msg" id="msg"  rows="3" class="form-control"></textarea>
                    </div>
                   
                     <div class="form-group mb-3">
                      <input type="submit" value="Submit" class="btn btn-primary float-end">
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
  @if(Session::has('status'))
  toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                "positionClass" : 'toast-bottom-right'
            }
  		toastr.success("{{ session('status') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
    "positionClass" : 'toast-bottom-right'
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
    
@endsection