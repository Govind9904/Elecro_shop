<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    // View all orders
    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    // View order details
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    // Update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return redirect()->back()->with('success', 'Order status updated');
    }

    // Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // delete order items first
        $order->items()->delete();

        // delete order
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }

    // Invoice
    public function invoice($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('admin.orders.invoice', compact('order'));
    }

    // Download Invoice
    public function downloadInvoice($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        $pdf = Pdf::loadView('admin.orders.invoice_pdf', compact('order'));

        return $pdf->download('invoice-' . $order->id . '.pdf');
    }
}
