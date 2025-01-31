<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'email' => 'required|email',
    ]);

    Order::create([
        'product_id' => $request->product_id,
        'name' => $request->name,
        'quantity' => $request->quantity,
        'email' => $request->email,
    ]);

    return redirect()->back()->with('success', 'Pesanan Anda berhasil dikirim!');
}

}