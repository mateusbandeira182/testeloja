<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $alert = session('alert');
        $type = session('type');
        return view('orders.index')
            ->with('alert', $alert)
            ->with('type', $type)
            ->with('orders', $orders);
    }
}
