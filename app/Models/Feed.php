<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use SoftDeletes;

    public $table = 'feeds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
