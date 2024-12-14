<?php

namespace App\Http\Controllers;

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function updateCartQuantity(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $cartItem = Cart::findOrFail($itemId);
        $cartItem->update(['quantity' => $request->quantity]);
        // Your cart update logic here
        // For example, update the cart using a CartService
    
        return redirect()->back();
    }
    
}

