@extends('app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

        @endif
        {!! Form::open(['route' => 'categories.store']) !!}



        <!-- Name Form Input-->
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>

        <!-- Description Form Input-->
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('categories')}}" class="btn btn-default">Back</a>
        </div>


        {!! Form::close() !!}
    </div>
@endsection