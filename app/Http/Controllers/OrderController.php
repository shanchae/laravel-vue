<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::orderby('created_at', 'desc')->paginate(5);

        return response()->json([
            'success' => true,
            'data' => $orders,
            'message' => 'Orders retrieved successfully'
        ], 200);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $order,
            'message' => 'Order retrieved successfully'
        ], 200);
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'buyer_id' => $request->input('buyer_id'),
            'total_price' => $request->input('total_price'),
            'shipping_status' => $request->input('shipping_status'),
            'payment_status' => $request->input('payment_status'),
            'shipping_address' => $request->input('shipping_address'),
            'payment_method' => $request->input('payment_method')
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $order,
            'message' => 'Order updated successfully'
        ], 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully'
        ], 200);
    }
}
