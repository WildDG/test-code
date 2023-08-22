@extends('products.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ubah Deskripsi Produk</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
  
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="tittle" class="form-label">Produk</label>
            <input type="text" class="form-control " id="produk" name="produk" required autofocus value="{{$product->Produk}}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control " id="slug" name="slug"  required value="{{$product->Slug}}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control " id="harga" name="harga"  required value="{{$product->Harga}}">
        </div>
        <di class="col-xs-12 col-sm-12 col-md-12">
            <label for="kategori" class="form-label">Kategori</label>
            <!-- <select class="form-select" name="kategori">
                    <option value="1">Digital Printing</option>
                    <option value="2">Spanduk</option>
                    <option value="3">Poster</option>
            </select>    -->
            <input type="text" class="form-control " id="kategori" name="kategori"  required value="{{$product->Kategori}}">   
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="image" class="form-label">Foto Produk</label>
                <!-- <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control " type="file" id="image" name="image" onchange="previewImage()">
                <label for="image" class="form-label" style="font-size: 12px; color: rgb(209, 5, 5)">Dimensi Foto Harus 400x400 pixel & Max. Sizenya 1 MB</label> -->
                <input type="text" class="form-control " id="foto" name="foto"  required value="{{$product->Foto}}">   
        </div>
        <di class="col-xs-12 col-sm-12 col-md-12">
            <label for="harga" class="form-label">Deskripsi</label>
            <input type="text" class="form-control " id="deskripsi" name="deskripsi"  required value="{{$product->Deskripsi}}"></input>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Perbaruhi Produk</button>
        </div>
    </div>
   
    </form>
@endsection