<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
    <form action="/post/{{$posts->id}}" method="POST">
        @csrf
        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror

        Event name<input type="text" name="eventname" value="{{$posts->eventname}}"><br>
        Category<input type="text" name="category" value="{{$posts->category}}"><br>
        Organizer<input type="text" name="organizer" value="{{$posts->organizer}}"><br>
        Address<input type="text" name="address" value="{{$posts->address}}"><br>
        Contact<input type="text" name="contact" value="{{$posts->contact}}"><br>
        Date<input type="date" name="date" value="{{$posts->date}}"><br>
        Time<input type="time" name="time" value="{{$posts->time}}"><br>
       
        <button class="btn btn-success">Edit Post</button>
    </form>
    </div>
</body>
</html>