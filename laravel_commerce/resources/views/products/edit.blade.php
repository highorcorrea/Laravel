@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Products: {{ $product->name }}</h1>

        @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

        @endif
        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}



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

            <!-- Featured Form Input-->
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::checkbox('featured') !!}
            </div>

            <!-- Recommend Form Input-->
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::checkbox('recommend') !!}
            </div>

        <div class="form-group">
            {!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection