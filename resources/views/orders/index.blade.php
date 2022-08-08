@extends('layouts.base')

@section('page.title')
    Orders
@endsection

@section('content')
    @foreach($list as $order)
        <div>
            {{ $order->number }}
            {{ $order->cost }}
            {{ $order->name }}
        </div>
    @endforeach
@endsection
