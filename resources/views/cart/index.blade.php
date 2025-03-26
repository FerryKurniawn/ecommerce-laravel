@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if (count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th> <!-- Optional column for other actions -->
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $productId => $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ number_format($product['price'], 0, ',', '.') }}</td> <!-- Format price with thousands separator -->
                        <td>
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-inline update-quantity-form">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" class="form-control quantity-input" data-product-id="{{ $productId }}" style="width: 60px;">
                            </form>
                        </td>
                        <td>{{ number_format($product['price'] * $product['quantity'], 0, ',', '.') }}</td> <!-- Format total with thousands separator -->
                        <td>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mt-2">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $product['price'] * $product['quantity']; @endphp
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <!-- Format total cart amount with thousands separator -->
            <h3>Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
            <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

<!-- Tombol Back to Shop -->
<a href="{{ route('shop') }}" class="btn btn-secondary" style="position: fixed; bottom: 20px; right: 20px; z-index: 100;">
    Back to Shop
</a>
@endsection
