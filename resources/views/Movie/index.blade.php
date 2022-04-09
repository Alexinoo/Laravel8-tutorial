@extends('layouts.master')

@section('title', 'Infinite Scroll Pagination')

@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Infinite Scroll Pagination</h2>
        </div>
           <div class="col-md-12" id="post-data">
           @include('Movie.data')
        </div>
    </div>
</div>
</section>
<div class="ajax-load text-center" style="display:none">
<p><img src="{{asset('images/loader.gif')}}" alt="gif" style="width: 50px;height:auto;"/>Loading more post..</p>
</div>

@endsection

@section('scripts')
<script>
function loadMoreData(page)
{
    $.ajax({
        url : '?page='+page,
        type   : 'GET' ,
        beforeSend : function () {
            $('.ajax-load').show()
        }
    }).done(function(data) {
        if(data.html == ""){
              $('.ajax-load').html('No more records found');
              return;
        }
         $('.ajax-load').hide();

          $('#post-data').append(data.html);

    }).fail(function( jqXHR, ajaxOptions , throwError) {
        
        alert('Server not responding ...');
    })
}

let page = 1 ;

$(window).scroll(function() {

    if(   ($(window).scrollTop()  + $(window).height() ) >= $(document).height()    ){

        page++;
        loadMoreData(page);
    }
});
</script>
@endsection