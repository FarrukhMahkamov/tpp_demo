<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Carousel extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'carousel_title',
        'carousel_number',
        'carousel_file',
        'carousel_link'
    ];

    public $translatable = [
        'carousel_title'
    ];
}
