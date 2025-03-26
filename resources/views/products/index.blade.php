@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Product List</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>  <!-- Kolom untuk menampilkan gambar -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            <!-- Menampilkan gambar produk jika ada -->
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="50" height="50">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
