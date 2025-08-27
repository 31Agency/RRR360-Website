<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ip',
        'vehicle_type_id',
        'full_name',
        'phone',
        'email',
        'pickup_location',
        'delivery_location',
        'preferred_pickup_date',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }
}
