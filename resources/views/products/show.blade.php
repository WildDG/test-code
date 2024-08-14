@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail Produk: {{ $product->produk }}</h2>
            </div>
            <div class="pull-right">
                <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.index') }}">Back</a>
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->slug) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
   
    <div class="row mt-4">
        <!-- Produk -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Produk:</strong>
                <p>{{ $product->produk }}</p>
            </div>
        </div>

        <!-- Slug -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Slug:</strong>
                <p>{{ $product->slug }}</p>
            </div>
        </div>

        <!-- Harga -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Harga:</strong>
                <p>Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Kategori -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Kategori:</strong>
                <p>{{ $product->kategori }}</p>
            </div>
        </div>

        <!-- Foto Produk -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Foto Produk:</strong><br>
                <img src="{{ $product->foto }}" alt="{{ $product->produk }}" class="img-fluid" style="max-width: 300px;">
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <p>{{ $product->deskripsi }}</p>
            </div>
        </div>

        <!-- Rating -->
        <div class="rating">
    @for ($i = 1; $i <= 5; $i++)
        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" {{ $product->rating >= $i ? 'checked' : '' }}>
        <label for="star{{ $i }}"></label>
    @endfor
        </div>

        </div>

        <!-- Terakhir Diperbarui -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Terakhir Diperbarui:</strong>
                <p>{{ $product->updated_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>
@endsection
