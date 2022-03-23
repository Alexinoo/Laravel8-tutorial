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
                        <h5>Single Post details
                            <a href="{{url('post')}}" class="btn btn-info float-end">View All Posts</a>
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
                                    <tr>
                                   <td>{{$post->id}}</td>
                                   <td>{{$post->title}}</td>
                                   <td>{{$post->body}}</td>
                               </tr>
                              
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