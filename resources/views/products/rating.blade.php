@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail dan Rating Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.index') }}">Back to Product List</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Detail Produk -->
            <h3>Detail Produk</h3>
            <p><strong>Nama:</strong> {{ $product->produk }}</p>
            <p><strong>Harga:</strong> {{ $product->harga }}</p>
            <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
            <p><strong>Deskripsi:</strong> {{ $product->deskripsi }}</p>
            <p><strong>Rating:</strong> {{ $product->rating ?? 'Belum ada rating' }}</p>
        </div>
        <div class="col-md-6">
            <!-- Rating Form -->
            <h3>Update Rating</h3>
            <form action="{{ route('products.updateRating', $product->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" step="0.1" value="{{ old('rating', $product->rating) }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit Rating</button>
            </form>
        </div>
    </div>
@endsection