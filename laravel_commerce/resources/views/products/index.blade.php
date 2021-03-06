@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <a href="{{route('products.create')}}" class="btn btn-sm btn-default">New Product</a>
        <br>
        <br>

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Tags</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ str_limit($product->description,$limit = 100, $end = '...') }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->tagList }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->featured ==1 ? 'yes' : 'no' }}</td>
                    <td>{{ $product->recommend ==1 ? 'yes' : 'no' }}</td>

                    <td>
                        <a href="{{ route('products.edit',['id' => $product->id, 'category' => $product->categ]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('products.images',['id' => $product->id]) }}" class="btn btn-sm btn-primary">Images</a>
                        <a href="{{ route('products.destroy',['id' => $product->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

        {!! $products->render() !!}

    </div>
@endsection