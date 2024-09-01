@extends("layouts.app")

@section("title", "Plants")

@section('content')
<div class="container-fluid main pt-5">
    <div class="container products-container p-5">
        <p class="text-secondary m-4">Home / Shop</p>
        <div class="row justify-content-between m-3">
            {{-- <div class="col-6">Showing 9-10 results</div> --}}
            <div class="col-6"></div>

            <div class="col-5">
                <form action="/sorted" method="GET">
                    <select name="sort" class="form-select" aria-label="Default select example" onchange="this.form.submit()">
                        <option value="" selected>Default sorting</option>
                        <option value="latest">Sort by latest</option>
                        <option value="price_low_high">Sort by price: Low to High</option>
                        <option value="price_high_low">Sort by price: High to Low</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="products">
            @foreach ($plants as $plant)
            <a href="plants/{{$plant->id}}" class="plant-card">
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
        <div>
            {{-- {{ $plants->links() }} --}}
        </div>
    </div>

    <br>
</div>
@endsection
