@extends('app')

@section('content')
    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <a href="{{ route('products.images.create', $product->id) }}" class="btn btn-default">New Image</a>
        <br>
        <br>

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>

            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>
                        <img src=" {{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="50">
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('products') }}" class="btn btn-default">Back</a>



    </div>
@endsection