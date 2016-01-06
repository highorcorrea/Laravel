@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if ($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

        @endif
        {!! Form::open(['route' => 'products.store']) !!}



        <!-- Name Form Input-->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Form Input-->
        <div class="form-group">
            {!! Form::label('description', 'Name:') !!}
            {!! Form::textarea('description',null, ['class' => 'form-control']) !!}
        </div>

            <!-- Price Form Input-->
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price',null, ['class' => 'form-control']) !!}
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
            {!! Form::submit('Add Product', ['class' => 'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection