@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Products: {{ $product->name }}</h1>

        @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

        @endif
        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}

        <!-- Select Form Input-->
        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id',$categories, $product->category->id, ['class' => 'form-control']) !!}
        </div>
        <!-- Name Form Input-->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',$product->name, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Form Input-->
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',$product->description, ['class' => 'form-control']) !!}
        </div>

            <!-- Price Form Input-->
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price',$product->price, ['class' => 'form-control']) !!}
            </div>

            <!-- Featured Recommend Form Input-->
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::checkbox('featured', 1, $product->featured) !!}

                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::checkbox('recommend',1, $product->recommend) !!}
            </div>
            <!-- Tags Form Input-->
            <div class="form-group">
                {!! Form::label('tag', 'Tag:') !!}
                {!! Form::textarea('tags',  $product->tagList, ['class' => 'form-control', 'placeholder' => 'Tag']) !!}
            </div>


        <div class="form-group">
            {!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('products')}}" class="btn btn-default">Back</a>
        </div>


        {!! Form::close() !!}

    </div>
@endsection