<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Counter extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photo',
    ];

    public $table = 'counters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_en',
        'title_ar',
        'sub_title_en',
        'sub_title_ar',
        'number',
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

    public function getSubTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('sub_title_en');
        }
        else
        {
            $value = $this->getAttribute('sub_title_ar');
        }

        return $value;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(44)->keepOriginalImageFormat();
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
}
