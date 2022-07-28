<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $fillable = [
        'category_name',
        'category_slug',
        'parent_category_id',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function getParentKeyName()
    {
        return 'parent_category_id';
    }
}
