<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth()->user();
        $orders = Order::query()->where(['created_by' => $user->id])->paginate(10);

        return view('order.index', compact('orders'));
    }

    public function view()
    {
        return 'one order';
    }
}
