<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Cart;
use App\Mail\ConfirmOrderMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DevelopmentController extends Controller
{
    public function index()
    {


        $data = Cart::getProductsAndCartItems()[1];
        $user = Auth::user();

        $products = [];

        $fullPrice = 0;

        foreach ($data as $productId => $item) {
            $product = Product::find($productId);
            $price = 0;
            if ($product) {

                $products[] = [
                    'title' => $product->title,
                    'quantity' => $item['quantity'],
                    $price = $product->price,
                ];

                $fullPrice += $item['quantity'] * $price;
            }
        }

        $orderData = [
            'total_price' => $fullPrice,
            'status' => 'new',
            'created_by' => $user->id,
            'updated_by' => $user->id,

        ];

        $order = Order::create($orderData);


        echo '<pre>';
        var_dump($order);
        echo '</pre>';

        dd($order);
        Mail::to($user->email)->send(new ConfirmOrderMail($products, $fullPrice));
        return 'Электронная почта отправлена успешно!';

        return view('development.app');
    }
}
