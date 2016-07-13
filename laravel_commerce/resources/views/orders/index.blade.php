@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Orders</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                @foreach($order->items as $k=>$item)
                                        {{$item->product->name}} - Qtd: {{$item->qtd}} - R$ {{ number_format($item->price, 2, ',', '.') }}
                                @endforeach
                            </td>
                            <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>

                            <td>
                                {{ $order->status ==1 ? 'Aprovado' : 'Pendente' }}
                            </td>
                            <td colspan="3">
                                <a href="{{ route('orders.edit', ['id'=>$order->id]) }}" class="btn btn-sm btn-success">Status Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection