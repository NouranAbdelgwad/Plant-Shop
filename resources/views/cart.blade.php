@extends('layouts.app')
@section('title', 'Cart')

@section('content')
    <div class="container">
        <h4>Cart</h4>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table" style="overflow-x: auto;">
            <table class="table table-hover mt-3 cart-table">
                <thead>
                    <tr class="head">
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="data">
                            <td class="close-img-cell">
                                <form action="{{ route('cart.delete', $item['id']) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="border: none; background: none;" type="submit" title="Remove item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </button>
                                </form>
                                <img class="products-img" src="{{ $item['image'] }}" alt="product">
                            </td>
                            <td class="product-title">{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>
                                <input class="qty" type="number" name="quantities[{{ $item['id'] }}]" value="{{ $item['qty'] }}" min="1" data-id="{{ $item['id'] }}">
                            </td>
                            <td>
                                {{ $item['price'] * $item['qty'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-xsm-9 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Cart Totals</h3>
                    <hr>
                    <span class="card-cell">
                        <p>Subtotal</p>
                        <p>${{ $subTotal }}</p>
                    </span>
                    <hr>
                    <span class="card-cell">
                        <p>Total</p>
                        <p>${{ $total }}</p>
                    </span>
                    <hr>
                    <form method="post" action="#" class="w-100 text-center">
                        <a href="#" class="green-btn w-100 text-center text-decoration-none">PROCEED TO CHECKOUT</a>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script>
        document.querySelectorAll('.qty').forEach(input => {
            input.addEventListener('change', function() {
                const itemId = this.getAttribute('data-id');
                const quantity = this.value;

                fetch('{{ route("cart.update") }}', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ quantities: { [itemId]: quantity } })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to update cart.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
