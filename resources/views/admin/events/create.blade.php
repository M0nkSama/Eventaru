<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create View</title>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
    <div class="container">
    <form action="/post" method="POST">
        @csrf

        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror
        Event name:<input type="text" name="eventname"><br>
        Category:<input type="text" name="category" > <br>
        Organizer:<input type="text" name="organizer"><br>
        Address:<input type="text" name="address"><br>
        Contact:<input type="text" name="contact"><br>
        Date:<input type="date" name="date"><br>
        Time:<input type="time" name="time"><br>
        <button class="btn btn-primary">Create new Post</button>
    </form>
    </div>
</body>
</html>