@extends('layouts.site')
@section('content')
    <br>

    @if (session('message'))
        <div class='alert alert-warning'>
            <center>
                <h4>{{ session('message') }}</h4>
            </center>
        </div>
        <br><br>
    @endif

    @if (session('result'))
        <div class='alert alert-warning'>
            <center>
                <h4>{{ session('result') }}</h4>
            </center>
        </div>
    @endif
    <br><br>

    <center>
        <form action="{{ route('search') }}" method="get">
            @csrf
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input class="form-control" type="text" style='width: 20%;' name="product_name"
                    placeholder="Search for products by Name">

                <button type="submit">
                    search
                </button>
            </div>
        </form>
        <form action="{{ route('filter') }}" method="get">
            @csrf
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> Category * </label>
                </div>
                <select class="form-control" type="text"  style="width:500px " multiple
                    name="category_id[]">


                    @foreach ($categories as $value)
                        <option value="{{ $value->id }}"> {{ $value->name }} </option>
                    @endforeach

                </select>
                <button type="submit">
                    Filter
                </button>
            </div>
        </form>

    </center>
    <br>


    <div class="listing-section">
        @foreach ($products as $product)
            <div class="product">
                <div class="image-box">
                    <div class="images">
                        <img src="{{ asset($product->image) }}"
                            style="width:75% ; height:65% ; margin-bottom: 5px; border-radius: 5px" />

                    </div>
                </div>
                <div class="text-box">
                    <h2 class="item">{{ $product->name }}</h2>
                    <h3 class="price">{{ $product->price }} LE</h3>
                    <p class="description">{{ $product->description }}</p>

                    <form action="{{ route('addToFavorite', $product->id) }}" method="POST">
                        @csrf
                        {{ csrf_field() }}

                        <button type="submit" name="item-1-button" id="item-1-button">Add to Favourite</button>

                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <center>
  {{$products->links()}}
</center> --}}
@endsection
