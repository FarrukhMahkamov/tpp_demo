<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_category_id',
    ];

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}