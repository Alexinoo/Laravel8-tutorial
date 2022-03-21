<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
    <h1>User View</h1>

    <p>Username :  {{ $name}}</p>

    <h4>User Details</h4>
    <p>Name : {{ $userDetails['name']}}</p>
    <p>Email : {{ $userDetails['email'] }}</p>
    <p>Phone : {{ $userDetails['phone'] }}</p>
    
</body>
</html>