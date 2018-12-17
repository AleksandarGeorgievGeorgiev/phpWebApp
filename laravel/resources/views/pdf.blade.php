<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="justify-content-center">Post PDF Format</title>
</head>
<body>
    <h1>{{$post->title}}</h1>
    <br>
    <img class="card-img flex-auto d-none d-md-block" style="width:250px" src="{{ URL::to('/') }}/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
</body>
</html>
