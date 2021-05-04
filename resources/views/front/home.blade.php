@extends("front.master")
@section('content')
<div  style="width:100%; padding-bottom:10px;" > 
<img style="width:100%" src="{{asset('home/top.png')}}"  >
</div>


<div class="container"  >
    @foreach ($categories as $item) 
<div class="category-item">
<div class="card" style="width: 18rem; float:right">
    <div style="width:20rem; height:100px">
  <img style="width:100%; height:100%;" class="card-img-top" src="{{asset('/images/category/'.$item["image"])}}" alt="category image">
    </div>
  <div class="card-body">
    <div style="width:18rem; height:50px; margin-bottom:8px ">
    <h3 style="width:100%; height:100%;" class="card-title">{{$item->categoryname}}</h3>
</div>
<div style="width:18rem; height:50px; padding-bottom:5px " >
    <p style="width:100%; height:100%;" class="card-text">{{$item->description}}</p>
</div>
  <div style="width:20rem; height:50px">
    <a href="#" class="btn btn-primary">View Category</a>
</div>
</div>
</div>
</div>
@endforeach
</div>


@endsection