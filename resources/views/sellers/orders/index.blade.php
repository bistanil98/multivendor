@extends('layouts.app')


@section('content')
<h4>Orders</h4>
<table class="table">
    <thead>
        <tr>
            <th>Order Number</th>
            <th>Status</th>
            <th>Item count</th>
            <th>Shipping Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td scope="row">{{$order->order_number}}</td>
            <td>{{$order->seller_order_status}}
            @if ($order->seller_order_status !='completed')

            <a href="{{route('seller.order.delivered',$order)}}" type="button"  class="btn btn-primary btn-sm">make as delivered</a>
            @endif
            </td>
            <td>{{$order->item_count_seller}}</td>
            <td>{!! $order->shipping_full_address !!}</td>
            <td>
                <a href="{{route('seller.orders.show',$order)}}" type="button" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection
