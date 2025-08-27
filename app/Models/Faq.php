<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Faq extends Model
{
    use SoftDeletes;

    public $table = 'faqs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('title_en');
        }
        else
        {
            $value = $this->getAttribute('title_ar');
        }

        return $value;
    }

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('description_en');
        }
        else
        {
            $value = $this->getAttribute('description_ar');
        }

        return $value;
    }
}
