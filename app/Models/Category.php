<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    use HasTranslations;

    public $translatable = [
        'category_name',
    ];

    protected $fillable = [
        'category_name',
        'category_slug',
        'is_visable',
        'parent_category_id',
    ];

    public function scopeVisable($query)
    {
        $query->where('is_visable', true);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function getParentKeyName()
    {
        return 'parent_category_id';
    }
}
