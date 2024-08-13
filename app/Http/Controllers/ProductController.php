<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        ]);
        
        // return($request->all());
        Product::create($request->all());
        
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Product::where('Slug',$slug)->first();
        return view('products.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $product = Product::where('Slug',$slug)->first();
        return view('products.edit',['product' => $product]);
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
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $product = Product::where('Slug',$slug)->first();
        $product->delete();
  
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
