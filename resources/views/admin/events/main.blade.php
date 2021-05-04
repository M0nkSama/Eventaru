<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Organizer</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Date</th>
    <th>Time</th>
    <th colspan="3">Actions</th>
</tr>
@foreach ($posts as $post )
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->eventname}}</td>
        <td>{{$post->category}}</td>
        <td>{{$post->organizer}}</td>
        <td>{{$post->address}}</td>
        <td>{{$post->contact}}</td>
        <td>{{$post->date}}</td>
        <td>{{$post->time}}</td>
        <td><a href="/post/{{$post->id}}/edit"><button class="btn btn-primary">Edit</button></a></td>
        <form method="POST" action="/post/{{$post->id}}">
        @csrf
        @method('delete')
        <td><input class="btn btn-info" type="submit" value="Delete"></td>
        </form>
        <td><a href=""><button class="btn btn-success">View</button></a></td>


    </tr>
@endforeach

</table>
<a href="/post/create" class="btn btn-success" >Create new Event</a>
</body>
</html>