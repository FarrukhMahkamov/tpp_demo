<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GovermentSite extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'goverment_site_title',
        'goverment_site_link',
        'goverment_site_file',
    ];

    public $translatable = [
        'goverment_site_title',
    ];
}
