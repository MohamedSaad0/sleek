<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{ 
    protected $fillable = [
        'name',
        'images'
    ];
    use HasFactory;
    
    public function products() :BelongsToMany{
        return $this->belongsToMany(Product::class);
    }
}
