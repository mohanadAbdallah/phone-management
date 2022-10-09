<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationData extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'body',
        'notification_type',
        'image',
        'status',
        'device_id','order_id','position','customer_id',
    ];
}
