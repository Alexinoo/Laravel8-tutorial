@extends('layouts.master')

@section('title', 'Multistep Form')

@section('content')

<section>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-white bg-info">
                    <h5>Multi Step Form</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('form.formSubmit')}}" class="contact-form" method="POST">
                        @csrf
                        <div class="form-section">
                            <label for="firstname">Firstname</label>
                            <input type="text"  name ="firstname"class="form-control" required/>
                            
                            <label for="lastname">Lastname</label>
                            <input type="text"  name ="lastname"class="form-control" required/>
                        </div>
                        <div class="form-section">
                            <label for="email">Email</label>
                            <input type="email"  name ="email"class="form-control" required/>

                            <label for="phone">Phone</label>
                            <input type="text"  name ="phone"class="form-control" required/>
                        </div>
                        <div class="form-section">
                            <label for="message">Message</label>
                            <textarea name="message" id="message"  rows="3" class="form-control"></textarea>                         
                        </div>
                        <div class="form-navigation">
                            <button type="button" class="previous btn btn-info float-left">Previous</button>                     
                            <button type="button" class="next btn btn-info float-end">Next</button>      
                            <button type="submit" class="btn btn-success float-end">Submit</button>               
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection

@section('scripts')
<script>
    $(function(){
        var $sections = $('.form-section');

        function navigateTo(index){
            
                $sections.removeClass('current').eq(index).addClass('current')

                $('.form-navigation .previous').toggle(index > 0)

                let atTheEnd = index >= $sections.length - 1 

                $('.form-navigation .next').toggle(!atTheEnd)

                $('.form-navigation [type=submit]').toggle(atTheEnd)
        }

          function curIndex(index){

            return $sections.index($sections.filter('.current'))

          }

          $('.form-navigation .previous').click(function(){
              navigateTo(curIndex() - 1 )
          })
          $('.form-navigation .next').click(function(){
             $('.contact-form').parsley().whenValidate({
                 group : 'block-' + curIndex() 
             }).done(function () {
                 navigateTo(curIndex() + 1)
             })
          })

          $sections.each(function(index,section) {
              $(section).find(':input').attr('data-parsley-group','block-' +index)
          })

          navigateTo(0);

    })
</script>
@endsection