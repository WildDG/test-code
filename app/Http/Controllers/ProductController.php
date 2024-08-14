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
            'produk' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            // Tidak memerlukan rating saat membuat produk
        ]);
        
        Product::create($request->all());
        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
            'produk' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);
  
        $product->update($request->all());
  
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
