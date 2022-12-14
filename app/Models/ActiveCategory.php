<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ActiveCategory extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'category_name',
    ];

    protected $fillable = [
        'category_name',
        'category_slug',
        'is_visable',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
