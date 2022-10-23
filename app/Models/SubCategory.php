<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
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
}
