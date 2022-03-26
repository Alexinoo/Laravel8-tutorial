@extends('layouts.master')

@section('title', 'Search Product')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="text-center">Search Products</h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group mb3">
                            <input type="text" class="form-control typeahead" placeholder="search..." />
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
        let path = "{{ url('autocomplete')}}";

        $('input.typeahead').typeahead({
            source: function(terms ,process){
                return $.get(path , {terms:terms} , function(data){
                     return process(data);
                });
            }
        })
    </script>
@endsection