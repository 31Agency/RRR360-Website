<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photo',
    ];

    public $table = 'articles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_by_id',
        'category_id',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'full_description_en',
        'full_description_ar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

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

    public function getFullDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('full_description_en');
        }
        else
        {
            $value = $this->getAttribute('full_description_ar');
        }

        return $value;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(620)->height(310)->keepOriginalImageFormat();
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

    public function scopeSearch($query, Request $request)
    {
        if ($request->input('search') && $request['search'] != null) {

            $query
                ->where('title_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('title_ar', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('description_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('description_ar', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('full_description_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('full_description_ar', 'LIKE', '%'.$request->input('search').'%')
            ;
        }
        elseif (isset($request['search']) && $request->input('search') == null) {
            $query->where('id', 0);
        }

        return $query;

    }
}
