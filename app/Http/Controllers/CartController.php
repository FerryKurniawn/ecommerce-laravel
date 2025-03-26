<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        // Mencari produk berdasarkan ID
        $product = Product::findOrFail($productId);

        // Mendapatkan keranjang belanja yang ada di session
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di dalam keranjang
        if (isset($cart[$productId])) {
            // Tambahkan jumlah (quantity) produk
            $cart[$productId]['quantity']++;
        } else {
            // Jika produk belum ada di dalam keranjang, tambahkan produk dengan quantity 1
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,  // Jika Anda ingin menyimpan gambar produk
            ];
        }

        // Simpan kembali keranjang belanja ke session
        session()->put('cart', $cart);

        // Kembalikan respon atau arahkan ke halaman keranjang
        return redirect()->route('shop')->with('success', 'Product added to cart!');
    }

    public function index()
    {
        // Mengambil data keranjang belanja dari session
        $cart = session()->get('cart', []);

        // Mengirim data keranjang ke view
        return view('cart.index', compact('cart'));
    }
    public function update(Request $request, $productId)
    {
        // Ambil keranjang yang ada di session
        $cart = session()->get('cart', []);

        // Pastikan produk ada di keranjang
        if (isset($cart[$productId])) {
            // Perbarui jumlah produk
            $cart[$productId]['quantity'] = $request->quantity;
        }

        // Simpan keranjang kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Hapus produk dari keranjang
    public function remove($productId)
    {
        // Ambil keranjang yang ada di session
        $cart = session()->get('cart', []);

        // Hapus produk dari keranjang
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // Simpan keranjang kembali ke session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Metode lain seperti 'index', 'remove', dll bisa ditambahkan sesuai kebutuhan.
}
