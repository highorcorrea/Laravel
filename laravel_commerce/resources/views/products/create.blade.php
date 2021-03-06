@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

        @endif
        {!! Form::open(['route' => 'products.store']) !!}


         <!-- Select Form Input-->
         <div class="form-group">
             {!! Form::label('category', 'Category:') !!}
             {!! Form::select('category_id',$categories, null, ['class' => 'form-control']) !!}
         </div>

        <!-- Name Form Input-->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>

        <!-- Description Form Input-->
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
        </div>

            <!-- Price Form Input-->
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price',null, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
            </div>

            <!-- Featured Recommend Form Input-->
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::checkbox('featured') !!}

                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::checkbox('recommend') !!}
            </div>

            <!-- Tags Form Input-->
            <div class="form-group">
                {!! Form::label('tag', 'Tag:') !!}
                {!! Form::textarea('tags',  null, ['class' => 'form-control', 'placeholder' => 'Tag']) !!}
            </div>

        <div class="form-group">
            {!! Form::submit('Add Product', ['class' => 'btn btn-sm btn-primary']) !!}
            <a href="{{route('products')}}" class="btn btn-sm btn-default">Back</a>
        </div>


        {!! Form::close() !!}
    </div>
@endsection