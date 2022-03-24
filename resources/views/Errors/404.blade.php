@extends('layouts.master')

@section('title', 'Page Not Found')

@section('content')
<section style="padding-top: 100px;">

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 style="font-size: 162px;">404</h1>
                <h2>Page Not Found</h2>
                <p>We are sorry, the page you requested could not be found</p>
                <a href="{{ url('/')}}" class="btn btn-primary">Visit Homepage</a>
            </div>
        </div>
    </div>
</section>

    @endsection