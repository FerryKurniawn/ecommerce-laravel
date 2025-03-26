@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shop</h2>

        <!-- Alert jika produk berhasil ditambahkan ke keranjang -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">  <!-- Memperkecil ukuran div menjadi col-md-3 -->
                    <div class="card">
                        @if ($product->image)
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 180px; object-fit: contain;">
                        @else
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="No image available" style="height: 180px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text">Price: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Lihat Keranjang dengan Icon Keranjang -->
    <a href="{{ route('cart.index') }}" class="btn btn-warning" style="position: fixed; bottom: 20px; right: 20px; z-index: 100; font-size: 24px;">
        <i class="fa fa-shopping-cart"></i> <!-- Menggunakan ikon keranjang -->
    </a>
</div>
@endsection
