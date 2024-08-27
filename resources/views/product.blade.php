@extends("layouts.app")

@section("title", "plant")

@section('content')
<style>
    p{
        font-size: larger;
    }
</style>
<div class="container-fluid main pt-5">
    <div class="container products-container p-5">
        @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session("success")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="product-details">
            <div class="img-container">
                <img src="{{$plant->image_1}}" alt="{{$plant->name}}">
            </div>
            <div class="txt-details">
                <p>{{$plant->category}}</p>
                <h1>{{$plant->name}}</h1>
                <p><b>${{$plant->price}}</b> +Free Shipping</p>
                <p>{{$plant->description}}</p>
                <br>
                <form action="/cart/add/{{$plant->id}}" class="add-cart" method="POST">
                    @csrf
                    <input value="{{$plant->id}}" type="hidden" name="id">
                    <input type="number" class="qty" name="qty" value="1">
                    <input type="submit" class="green-btn qty-btn" value="Add to cart">
                </form>
                <hr>
                <p>Categories: {{$plant->category}}</p>
            </div>
        </div>
        <hr>
        <h1>Related Products</h1>
        <div class="products">
            @foreach ($plants as $plant)
            <a href="{{ url('plants/' . $plant->id) }}" class="plant-card">
            <div class="plant">
                <img src="{{$plant->image_1}}"
                    class="plant-img" alt="plant">
                <div id="star-rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <h5>{{$plant->name}}</h5>
                <p class="text-secondary">{{$plant->category}}</p>
                <p><b>${{$plant->price}}</b></p>
            </a>
            </div>
            @endforeach
        </div>
    </div>
    <br>
</div>
@endsection
