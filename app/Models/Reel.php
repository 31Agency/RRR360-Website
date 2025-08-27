<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Reel extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photo',
        'video',
    ];

    public $table = 'reels';

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(510)->keepOriginalImageFormat();
//        $this->addMediaConversion('thumb')->width(300);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb'));
            }
        }

        return $file;
    }

    public function getVideoAttribute()
    {
        $file = $this->getMedia('video')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1")
            {
                $file->url = str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $file->getUrl(''));
            }
            else
            {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl(''));
            }
        }

        return $file;
    }
}
