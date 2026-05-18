<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tambahkan (Request $request) agar bisa menangkap parameter dari URL
    public function index(Request $request)
    {
        // 1. Siapkan kerangka query dasar (Eager Loading relasi kategori)
        $query = Product::with('category')->latest();

        // 2. Fitur SEARCHING (Pencarian Berdasarkan Nama Produk)
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 3. Fitur FILTERING (Penyaringan Berdasarkan Kategori)
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 4. Fitur PAGINATION (Membatasi data, misal 5 data per halaman)
        $products = $query->paginate(5);

        // Kembalikan ke dalam format JSON Resource
        return new ProductResource(true, 'List Data Products', $products);
    }

    //... fungsi store, show, update, destroy biarkan saja
}
