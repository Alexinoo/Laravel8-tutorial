@extends('layouts.master')

@section('title', 'Lazy Loading')
   
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
              @for($i = 0; $i < 3; $i++)
                      <img data-original = "http://45.33.113.129/images/img-{{$i}}.jpg" />
             @endfor
        </div>
     
    </div>
</div>
    
@endsection

@section('scripts')
<script>
      $(document).ready(function(){

        $('img').lazyload()
      });
</script>
  
@endsection