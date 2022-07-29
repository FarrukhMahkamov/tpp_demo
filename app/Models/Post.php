<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'post_title',
        'post_body',
    ];
    
    protected $fillable = [
        'post_title',
        'post_body',
        'category_id',
        'post_slug',
        'is_visable'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
