@extends('layouts.app')


@section('content')
<h4>Order Summary</h4>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{$item->pivot->quantity}}

            </td>
            <td>{{$item->pivot->quantity}}</td>

        </tr>

        @endforeach

    </tbody>
</table>

@endsection
