<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    /* Every category has Many subcategories*/
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
