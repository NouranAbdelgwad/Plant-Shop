@extends("layouts.app")

@section("title", "About us")

@section("content")
<div class="container-fluid d-flex flex-column flex-md-row justify-content-between">
    <iframe
    src="https://www.youtube.com/embed/XHOmBV4js_E?autoplay=1"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
    class="w-100 w-md-50 p-5"
    height="400">
</iframe>

    <div class="w-100 w-md-50 p-5">
        <h1>Our Story</h1>
        <h3>For People Who Love Plants</h3>
        <p>Vivamus quam sociis tristique diam at donec nisl, hendrerit leo nunc at velit lacinia porttitor a nulla
            tellus ultrices varius aliquet sed in placerat.
            Facilisis eu faucibus diam cursus pulvinar consectetur purus sem felis, mauris consectetur nisl vitae
            gravida ultricies sem condimentum aliquet ut sed gravida amet vitae euismod pulvinar volutpat laoreet
            pharetra.</p>
        <button class="green-btn">Read More</button>
    </div>
</div>
<div class="images container">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-1.jpg" alt="plant" class="plant m-2">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-6.jpg" alt="plant" class="plant m-2">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-2.jpg" alt="plant" class="plant m-2">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-3.jpg" alt="plant" class="plant m-2">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-4.jpg" alt="plant" class="plant m-2">
    <img src="https://websitedemos.net/plant-shop-02/wp-content/uploads/sites/931/2021/08/plants-store-gallery-img-5.jpg" alt="plant" class="plant m-2">

</div>
@endsection
