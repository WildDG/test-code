@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $product->Produk }}</h2>
            </div>
            <div class="pull-right">
            <form action="{{ route('products.destroy',$product->slug) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.index') }}">back</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$product->slug) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $product->Foto }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $product->Deskripsi }}
            </div>
        </div>
    </div>
@endsection