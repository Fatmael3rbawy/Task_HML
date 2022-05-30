@extends('layouts.site')
@section( 'content')
<br><br>

<div class="listing-section">
    @foreach($favorite_products as $product)
    <div class="product">
        <div class="image-box">
          <div class="images" >
            <img src="{{asset($product->image)}}" style="width:75% ; height:65% ; margin-bottom: 5px; border-radius: 5px" /> 

          </div>
        </div>
        <div class="text-box">
          <h2 class="item">{{$product->name}}</h2>
          <h3 class="price">{{$product->price}} LE</h3>
          <p class="description">{{$product->description}}</p>
        </div>
      </div>
    @endforeach
</div>
@endsection
