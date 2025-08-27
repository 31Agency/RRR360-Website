<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;

    public $table = 'specifications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'property_id',
        'title_en',
        'title_ar',
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

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
