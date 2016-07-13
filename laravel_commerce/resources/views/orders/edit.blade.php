@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Edit Order: {{ $order->id }}</h1>
            {!! Form::model($order, ['route'=>['orders.update', $order->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('status', 'Status:') !!}
                {!! Form::select('status', [0 => 'Pendente', 1 => 'Aprovado'],  null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('orders') }}" class='btn btn-default '>Back</a>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection