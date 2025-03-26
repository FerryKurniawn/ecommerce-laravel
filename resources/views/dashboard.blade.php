@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        <a href="{{ route('products.index') }}" class="ms-3 inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-800">
    {{ __('Kelola Produk') }}
</a>
    </div>
@endsection
    