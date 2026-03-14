<h2>Order Invoice</h2>

<p>Order ID : {{ $order->id }}</p>
<p>Name : {{ $order->name }}</p>
<p>Phone : {{ $order->phone }}</p>
<p>Email : {{ $order->email }}</p>
<p>Address : {{ $order->address }}</p>

<hr>

<table border="1" width="100%">

    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>

    @foreach($order->items as $item)

    <tr>

        <td>{{ $item->product->name }}</td>

        <td>{{ $item->price }}</td>

        <td>{{ $item->qty }}</td>

        <td>{{ $item->price * $item->qty }}</td>

    </tr>

    @endforeach

</table>

<h3>Total : {{ $order->total }}</h3>