@extends('layouts.site')
@section( 'content')
<br><br>

<br>
  @if(session('message'))
  <div class='alert alert-warning' >
    <center>
      <h4>{{session('message')}}</h4>
    </center>
  </div>
  @endif

<div class="listing-section">
    @foreach($results as $product)
    <div class="product">
        <div class="image-box">
          <div class="images" >
            <img src="{{asset($product->image)}}" style="width:75% ; height:65% ; margin-bottom: 5px; border-radius: 5px" /> 

          </div>
        </div>
        <div class="text-box">
          <h2 class="item">{{$product->name}}</h2>
          <h3 class="item"> category: {{ $product->category->name }} </h3>
          <h3 class="price">{{$product->price}} LE</h3>
          <p class="description">{{$product->description}}</p>

         <form action="{{route('addToFavorite', $product->id)}}" method="POST">
          @csrf
          {{csrf_field()}}

          <button type="submit" name="item-1-button" id="item-1-button">Add to Favourite</button>

         </form>
        </div>
      </div>
    @endforeach
</div>
<center>
  {{ $results->links() }} 
</center>
@endsection
