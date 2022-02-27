<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\OrderDetail;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    private $order;
    private $orderDetail;
    public function __construct(Order $order, OrderDetail $orderDetail) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function addToCart($id, Request $request) {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else{
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->feature_image_path,
                'product_id' => $product->id,
                'color' => $request->color,
                'size' => $request->size,
            ];
        }
        session()->put('cart', $cart);
        $total = count($cart);
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'total' => $total,
        ], 200);
    }

    public function showCart() {
        $carts = session()->get('cart');
        return view('frontend.cart', compact('carts'));
    }

    public function updateCart(Request $request) {
            $carts = session()->get('cart');
            $quantity = $request->quantity;
            $id = $request->productId;
            $carts[$id]['quantity'] = $quantity;
            session()->put('cart', $carts);
        $carts = session()->get('cart');
        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function checkout() {
        return view('frontend.checkout');
    }

    public function checkoutPost(Request $request) {
        if(session()->has('customer')) {
            $customer_id = session()->get('customer')->id;
            $orders = session()->get('cart');
            $total = 0;
            foreach ($orders as $order) {
                $total += $order['price'] * $order['quantity'];
            }
            $this->order->create([
                'customer_id' => $customer_id,
                'total' => $total,
            ]);
            $order_id = DB::getPdo()->lastInsertId();
            foreach($orders as $order) {
               
                $this->orderDetail->create([
                    'order_id' => $order_id,
                    'product_id' => $order['product_id'],
                    'color' => $order['color'],
                    'size' => $order['size'],
                    'quantity' => $order['quantity'],
                    'price' => $order['price'],
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
            }
            $request->session()->forget('cart');
            return redirect()->route('home.index');
        }else {
            return redirect()->route('customer.login');
        }

    }

}
