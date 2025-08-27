<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Quote extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photo',
    ];

    public $table = 'quotes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'position',
        'value',
        'description_en',
        'description_ar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(90)->height(30)->keepOriginalImageFormat();
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            if ($file) {
                if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1")
                {
                    $file->url       = str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $file->getUrl(''));
                    $file->thumbnail = str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $file->getUrl('thumb'));
                }
                else
                {
                    $file->url       = str_replace('localhost', 'localhost:8000', $file->getUrl(''));
                    $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb'));
                }
            }
        }

        return $file;
    }

    public function getNameAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('name_en');
        }
        else
        {
            $value = $this->getAttribute('name_ar');
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
