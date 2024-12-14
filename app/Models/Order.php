<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    public static function getTotalItems()
    {
        $userId = Auth::id(); // Get the ID of the authenticated user

        return self::where('user_id', $userId)->count();
        // return self::count();
    }
}
