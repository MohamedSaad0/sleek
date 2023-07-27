<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'total_price',
        'payment_method',
        'city',
        'state',
        'country',
        'shipping_address',
        'user_id'
    ];
    use HasFactory;
    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
