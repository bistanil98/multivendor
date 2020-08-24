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
        @foreach ($orders as $suborder)
        <tr>
            <td scope="row">{{$suborder->order->order_number}}</td>
            <td>{{$suborder->status}}
            @if ($suborder->status !='completed')

            <a href="{{route('seller.order.delivered',$suborder)}}" type="button"  class="btn btn-primary btn-sm">make as delivered</a>
            @endif
            </td>
            <td>{{$suborder->item_count}}</td>
            <td>{!! $suborder->order->shipping_address !!}</td>
            <td>
                <a href="{{route('seller.orders.show',$suborder)}}" type="button" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection
