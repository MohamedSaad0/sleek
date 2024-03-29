<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];

    protected $with = ['categories'];
    use HasFactory;
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, CategoryProduct::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Filter products by subcategory
     * @param string $subcategory name
     * @return \Illuminate\Support\Collection
     */
    public function filterBySubCategory($query,$subcategory)
    {
        return $query->where('subcategory', $subcategory)->get();
    }
}
