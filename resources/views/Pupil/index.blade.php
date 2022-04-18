@extends('layouts.master')

@section('title', 'Pupil')

@section('content')
<section style="padding-top: 50px">
    <div class="row">
        <div class="col-md-12">
            {!!  $dataTable->table() !!}
        </div>
    </div>
</section>

@endsection

@section('scripts')
    {!!  $dataTable->scripts() !!}
@endsection


