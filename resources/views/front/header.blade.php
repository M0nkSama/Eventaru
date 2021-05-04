<?php
use App\Http\Controllers\ProductController;
$total=0;
if (Session::has("user"))
 {
  $total=ProductController::cartItem();
}

?>
<div style="width:100%">
<!-- Image and text -->
<nav class="navbar navbar-light" style="background-color:#fff5e6;  width:100%;  ">
    <img src="{{asset('home/eventaru.png')}}" width="75" height="55" class="d-inline-block align-top" alt="">
    <div style="float:right;" class="nav navbar-nav ">
 
            <div>
            @auth
                        <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
</div>
</nav>

<nav class="navbar navbar-dark" style="background: #ffc266; margin-top:-20px; margin-bottom:-20px; " >
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
 
        <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul style="margin-left:160px" class="nav navbar-nav" >
          <li class="active" ><a style="color:black;" href="/">Home</a></li>
          <li class="  "><a style="color:black;" href="#">Category</a></li>
          <li class="  "><a style="color:black;" href="#">About Us</a></li>
        </ul>
        <form action="/search" class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box" placeholder="eg.IT" required>
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color:black;"  href="/cartlist">Bookmark({{$total}})</a></li>
        
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  </div>