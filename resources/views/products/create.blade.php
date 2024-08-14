@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
  
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="produk" class="form-label">Produk</label>
                <input type="text" class="form-control" id="produk" name="produk" required autofocus value="">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required value="">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required value="">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option value="Digital Printing">Digital Printing</option>
                    <option value="Spanduk">Spanduk</option>
                    <option value="Poster">Poster</option>
                </select>   
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="foto" class="form-label">Foto Produk</label>
                <input type="text" class="form-control" id="foto" name="foto" required value="">   
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                <button type="submit" class="btn btn-primary">Terbitkan Produk</button>
            </div>
        </div>
    </form>
@endsection
