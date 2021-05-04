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
    <form class="form-horizontal" action="/category" method="POST" enctype='multipart/form-data'>
        @csrf

        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror
        Category name:<input type="text" name="categoryname" required><br>
        Description:<input type="text" name="description" required > <br>
        Image:<input type="file" name="image"><br>
        <button class="btn btn-primary">Create new Post</button>
    </form>
    </div>
</body>
</html>
