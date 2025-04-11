<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;

class OrderItemController extends Controller
{
    //
    public function index()
    {
        $items = OrderItem::all();

        return response()->json([
            'success' => true,
            'data' => $items,
            'message' => 'Order items retrieved successfully'
        ], 200);
    }

    public function show($id)
    {
        // Logic to retrieve a specific order item by ID
        $item = OrderItem::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $item,
            'message' => 'Order item retrieved successfully'
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));

        $item = [
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
                'price' => $product->price,
                'total_price' => $product->price * $request->input('quantity'),
                'order_id' => Order::create([
                    'buyer_id' => $request->input('buyer_id'),
                    'total_price' => $product->price * $request->input('quantity'),
                    'shipping_status' => 'pending',
                    'payment_status' => 'unpaid',
                    'shipping_address' => $request->input('shipping_address'),
                    'payment_method' => $request->input('payment_method')
                ])->id
            ];

        $orderItem = OrderItem::create($item);

        return response()->json([
            'success' => true,
            'data' => $orderItem,
            'message' => 'Order item created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing order item

        $item = OrderItem::findOrFail($id);

        if ($request->has('quantity')  && $request->input('quantity') > 0) {
            if ($request->has('product_id')) {
                $product = Product::findOrFail($request->input('product_id'));
            } else {
                $product = Product::findOrFail($item->product_id);
            }
                $item->product_id = $product->id;
                $item->price = $product->price;
                $item->quantity = $request->input('quantity');
                $item->total_price = $product->price * $request->input('quantity');

                Order::where('id', $item->order_id)->update([
                    'total_price' => $product->price * $request->input('quantity'),
                ]);

                $item->save();

        }

        return response()->json([
            'success' => true,
            'data' => $item->load('product')->load('order'),
            'message' => 'Order item updated successfully'        
        ], 200);

    }

    public function destroy($id)
    {
        // Logic to delete an order item
        $item = OrderItem::findOrFail($id);
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order item deleted successfully'
        ], 200);
    }
}
