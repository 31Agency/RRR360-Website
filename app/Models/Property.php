<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'photos',
    ];

    public $table = 'properties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'floor_id',
        'status_id',
        'furnishing_id',
        'system_id',
        'title_en',
        'title_ar',
        'sub_title_en',
        'sub_title_ar',
        'location_en',
        'location_ar',
        'description_en',
        'description_ar',
        'map',
        'bedrooms',
        'bathrooms',
        'area',
        'building_age',
        'price',
        'price_per',
        'ref_no',
        'street_name',
        'building_number',
        'latitude',
        'longitude',
        'outdoor_area',
        'master_bedrooms',
        'parking_spaces',
        'deposit',
        'maintenance_fee',
        'landlord_name',
        'landlord_phone',
        'guard_name',
        'guard_phone',
        'tags',
        'availability_date',
        'notes',
        'video',
        'virtual360',
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

    public function getLocationAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('location_en');
        }
        else
        {
            $value = $this->getAttribute('location_ar');
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function furnishing()
    {
        return $this->belongsTo(Furnishing::class, 'furnishing_id');
    }

    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class, 'property_specification');
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'property_owner');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(950)->keepOriginalImageFormat();
//        $this->addMediaConversion('thumb')->width(300);
    }

    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $item->url = str_replace('localhost/storage', $_SERVER['SERVER_NAME'] . '/system/storage/app/public', $item->getUrl());
                $item->thumbnail = str_replace('localhost/storage', $_SERVER['SERVER_NAME'] . '/system/storage/app/public', $item->getUrl('thumb'));
            } else {
                $item->url = str_replace('localhost', 'localhost:8000', $item->getUrl());
                $item->thumbnail = str_replace('localhost', 'localhost:8000', $item->getUrl('thumb'));
            }
        });

        return $files;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photos')->first();

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

    public function getDocumentAttribute()
    {
        $file = $this->getMedia('document')->last();

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

    public function scopeSearch($query, Request $request)
    {
        if ($request->input('category')) {
            $query->whereHas('category',
                function ($query) use ($request) {
                    $query->where('id', $request->input('category'));
                });
        }

        if ($request->input('specifications')) {
            $query->whereHas('specifications',
                function ($query) use ($request) {
                    $query->whereIN('id', $request->input('specifications'));
                });
        }

        if ($request->input('furnishing')) {
            $query->whereHas('furnishing',
                function ($query) use ($request) {
                    $query->whereIN('id', $request->input('furnishing'));
                });
        }

        if ($request->input('bedrooms')) {

            $query
                ->where('bedrooms', $request->input('bedrooms'))
            ;
        }

        if ($request->input('max_price')) {

            $query
                ->where('price', '<=', $request->input('max_price'))
            ;
        }

        if ($request->input('search') && $request['search'] != null) {

            $query
                ->where('title_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('title_ar', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('sub_title_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('sub_title_ar', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('description_en', 'LIKE', '%'.$request->input('search').'%')
                ->orWhere('description_ar', 'LIKE', '%'.$request->input('search').'%')
            ;
        }
        elseif (isset($request['search']) && $request->input('search') == null) {
            $query->where('id', 0);
        }

        return $query;

    }
}
