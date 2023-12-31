<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Cart;
use App\Mail\ConfirmOrderMail;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function checkout()
    {

    }
    public function index()
    {
        $cartItems = Cart::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }

        return view('cart.index', compact('cartItems', 'products', 'total'));
    }
    public function add(Request $request, Product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();
        if ($user) {

            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->update();
            } else {
                $data = [
                    'user_id' => $request->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ];
                CartItem::create($data);
            }

            return response([
                'count' => Cart::getCartItemsCount()
            ]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            $productFound = false;
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] += $quantity;
                    $productFound = true;
                    break;
                }
            }
            if (!$productFound) {
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ];
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);
        }
    }
    public function remove(Request $request, Product $product)
    {
        $user = $request->user();
        if ($user) {
            $cartItem = CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->delete();
            }

            return response([
                'count' => Cart::getCartItemsCount(),
            ]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as $i => &$item) {
                if ($item['product_id'] === $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);
        }
    }
    public function removeAllItemsFromCart(Request $request)

    {
        $user = $request->user();
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

        Mail::to($user->email)->send(new ConfirmOrderMail($products, $fullPrice));
        CartItem::where('user_id', $user->id)->delete();
        return response(['message' => 'Order send']);
    }

/*    public function removeAllItemsFromCart(Request $request)

    {
        $user = $request->user();

        if ($user) {
            CartItem::where('user_id', $user->id)->delete();
        } else {
            $cartItems = json_decode($request->cookie('cart_items'), true) ?? [];
            $cartItems = [];

            $response = new Response();
            $response->withCookie(cookie('cart_items', json_encode($cartItems), 60 * 24 * 30));

            return $response;
        }
        return response(['message' => 'All items have been removed from the cart.']);
    }*/
    public function updateQuantity(Request $request, Product $product)
    {
        $quantity = (int)$request->post('quantity');
        $user = $request->user();
        if ($user) {
            CartItem::where([
                'user_id' => $request->user()->id,
                'product_id' => $product->id
            ])->update(['quantity' => $quantity]);

            return response([
                'count' => Cart::getCartItemsCount(),
            ]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);
        }
    }


    public function approveOrder(Request $request)

    {
        $user = $request->user();
        $data = Cart::getProductsAndCartItems()[1];
        $user = Auth::user();

        $products = [];

        foreach ($data as $productId => $item) {
            $product = Product::find($productId);

            if ($product) {
                $products[] = [
                    'title' => $product->title,
                    'quantity' => $item['quantity']
                ];
            }
        }
        Mail::to($user->email)->send(new ConfirmOrderMail($products));
        CartItem::where('user_id', $user->id)->delete();
        return response(['message' => 'Order send']);

    }

}
