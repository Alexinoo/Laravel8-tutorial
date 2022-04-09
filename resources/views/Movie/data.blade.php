@foreach($movies as $key => $value)
    <div class="card mb-5">
        <div class="card-header">
            <h3><a href=""></a>{{$value->title}}</h3>
        </div>
        <div class="card-body">
            <p>{{$value->description}}</p>
            <div class="text-center">
                <button type = "button" class="btn btn-success">Read more</button>
            </div>
        </div>
    </div>
@endforeach