<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public function users() :HasMany {
        return $this->hasMany(User::class);
    }
    public function products() :HasMany {
        return $this->hasMany(Product::class);
    }
}
