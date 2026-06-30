<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = ['name', 
        'price', 
        'description', 
        'category_id', 
        'user_id',
        'image'];

    public function allergens(): BelongsToMany
    {
        return $this->belongsToMany(Allergen::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

      public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
