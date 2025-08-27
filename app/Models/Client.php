<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photo',
    ];

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(193)->height(35)->keepOriginalImageFormat();
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
