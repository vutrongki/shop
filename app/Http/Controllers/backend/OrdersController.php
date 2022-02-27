<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //
    private $order, $orderDetail;
    public function __construct(Order $order, OrderDetail $orderDetail) {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function index() {
        $orders = $this->order->all();
        return view('backend.orders.index', compact('orders'));
    }

    public function detail($id) {
        $order = $this->order->find($id);
        $data = DB::table("order_details")->where("order_id","=",$order->id)->get();
        return view('backend.orders.detail', compact('order', 'data'));
    }

    public function update($id) {
        $this->order->find($id)->update([
            'status' => 1,
        ]);
        return back();
    }
}
