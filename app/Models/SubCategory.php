<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'is_active',
    ];

    /* every subcategory bleongsto a category */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function products(){
        return $this->hasMany(Product::class);
    }
}
