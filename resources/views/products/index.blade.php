@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Produk Saya</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->produk }}</td>
            <td>{{ $product->harga }}</td>
            <td>{{ $product->kategori }}</td>
            <td>
                <div class="d-flex">
                    <!-- Tombol Show -->
                    <a class="btn btn-info me-2" href="{{ route('products.show', $product->slug) }}">Show</a>
                    
                    <!-- Tombol Edit -->
                    <a class="btn btn-primary me-2" href="{{ route('products.edit', $product->slug) }}">Edit</a>

                    <!-- Form Delete -->
                    <form action="{{ route('products.destroy', $product->slug) }}" method="POST" class="me-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <!-- Tombol Rating -->
                    <a class="btn btn-secondary" href="{{ route('products.rating', $product->slug) }}">Rating</a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
@endsection
