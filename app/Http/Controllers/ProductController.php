<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show All Data
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'produk' => 'required',
            'harga' => 'required',
            'slug' => 'required|unique:products,slug',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'tanggal_pembuatan' => 'required|date', 
        ]);

        $imagePath = $request->file('foto')->store('products', 'public');

        $product = new Product([
            'customer_name' => $request->input('customer_name'),
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'slug' => $request->input('slug'),
            'kategori' => $request->input('kategori'),
            'foto' => $imagePath,
            'deskripsi' => $request->input('deskripsi'),
            'tanggal_pembuatan' => $request->input('tanggal_pembuatan'), 
        ]);

        $product->save();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'customer_name' => 'required',
            'produk' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'tanggal_pembuatan' => 'required|date',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $imagePath = $product->foto;
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('products', 'public');
        }

        $product->update([
            'customer_name' => $request->input('customer_name'),
            'produk' => $request->input('produk'),
            'harga' => $request->input('harga'),
            'slug' => $request->input('slug'),
            'kategori' => $request->input('kategori'),
            'foto' => $imagePath,
            'deskripsi' => $request->input('deskripsi'),
            'tanggal_pembuatan' => $request->input('tanggal_pembuatan'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    /**
     * Show the form for rating the specified product.
     */
    public function showRatingForm($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.rating', compact('product'));
    }

    /**
     * Update the rating for the specified product.
     */
    public function updateRating(Request $request, $slug)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();
        $product->rating = $request->input('rating');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Rating updated successfully');
    }
}
