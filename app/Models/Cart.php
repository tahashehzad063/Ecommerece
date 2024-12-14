<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    // Cart.php (Assuming this is your Cart model)
protected $fillable = [
    'name', 'email', 'phone', 'address', 'user_id', 'product_title', 'price', 'image', 'product_id', 'quantity',
];
// In your Cart model
protected $guarded = [];

    // protected $fillable = [
    //     'product_title',
    //     'quantity', // Add this line if it's not already present
    //     // Other attributes...
    // ];
    public static function getTotalItems()
    {
        $userId = Auth::id(); // Get the ID of the authenticated user

        return self::where('user_id', $userId)->count();
        // return self::count();
    }
}
