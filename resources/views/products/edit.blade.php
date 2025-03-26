@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL (Optional)</label>
                <input type="url" name="image" class="form-control" value="{{ $product->image }}" placeholder="Enter image URL">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
