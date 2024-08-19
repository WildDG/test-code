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
        <!-- Nama Pemesan -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Nama Pemesan:</strong>
                <p>{{ $product->customer_name }}</p>
            </div>
        </div>

        <!-- Produk -->
        <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
            <div class="form-group">
                <strong>Nama Produk:</strong>
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
        <div class="rating mb-4">
            <div class="form-group">
                <strong>Rating:</strong>
                <div>
                    @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="{{ $product->rating >= $i ? 'gold' : 'lightgray' }}" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    @endfor
                </div>
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
    