@extends('layouts.master')

@section('title', 'Pupil')

@section('content')
<section style="padding: 50px">
    <div class="row">
        <div class="col-md-12  text-center">
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Pupils Records</h5>
                </div>
                <div class="card-body">
                    
                    {!!  $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    {!!  $dataTable->scripts() !!}
@endsection


