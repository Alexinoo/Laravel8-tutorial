<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB CRUD OPERATIONS</title>
     <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>All Posts
                            <a href="{{url('post/add-post')}}" class="btn btn-primary float-end">Add Post</a>
                        </h5>
                    </div>
                    <div class="card-body">
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Title</th>
                                   <th>Body</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($posts as $key => $value)
                                    <tr>
                                   <td>{{$value->id}}</td>
                                   <td>{{$value->title}}</td>
                                   <td>{{$value->body}}</td>
                               </tr>
                               @endforeach
                              
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>  
</body>
</html>