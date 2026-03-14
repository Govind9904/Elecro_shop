@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <h3 class="mb-4">Shopping Cart</h3>

    @if(session('cart') && count(session('cart')) > 0)

    <div class="container py-5">

        <table class="table table-striped align-middle">

            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="200">Quantity</th>
                    <th>Total</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                @php $grandTotal = 0; @endphp

                @foreach(session('cart') as $id => $item)

                @php
                $total = floatval($item['price']) * intval($item['quantity']);
                $grandTotal += $total;
                @endphp

                <tr>

                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('uploads/'.$item['image']) }}" width="60" class="rounded">
                            <span>{{ $item['name'] }}</span>
                        </div>
                    </td>

                    <td>₹{{ number_format($item['price'],2) }}</td>

                    <td>

                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex gap-2">
                            @csrf

                            <div class="d-flex align-items-center" style="max-width:200px">
                                <input type="text" class="form-control text-center qty-input" value="{{ intval($item['quantity']) }}" readonly style="max-width:80px">
                            </div>

                        </form>

                    </td>

                    <td class="row-total" data-price="{{ floatval($item['price']) }}">
                        ₹{{ number_format($total,2) }}
                    </td>

                    <td class="text-center">

                        <a href="{{ route('cart.remove',$id) }}"
                            class="btn btn-sm btn-danger">
                            Remove
                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>


        <div class="d-flex justify-content-end">

            <div class="card p-3" style="width:300px">

                <h5 class="mb-3">Cart Summary</h5>

                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong>₹{{ number_format($grandTotal,2) }}</strong>
                </div>

                <a href="{{ url('/checkout') }}" class="btn btn-success mt-3 w-100">
                    Proceed to Checkout
                </a>

            </div>

        </div>

    </div>

    @else

    <div class="container py-5 text-center">
        <h4>Your Cart is Empty</h4>
        <a href="{{ url('/products') }}" class="btn bg-orange text-white mt-3">
            Continue Shopping
        </a>
    </div>

    @endif
    @endsection