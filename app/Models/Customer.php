<?php

namespace App\Models;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable,SoftDeletes,CascadeSoftDeletes;

    protected $fillable=[
        'customer_name',
        'email',
        'phone',
        'identity',
        'address',
        'created_at',
    ];

    protected $cascadeDeletes = ['mobile'];
    protected $dates = ['deleted_at'];

    public function mobile()
    {
        return $this->hasOne(Mobile::class);
    }

    public function getStatusColorAttribute()
    {
        $status = $this->status;
        if ($status == 0) {
            return 'badge badge-light-success fs-8 fw-bolder';
        } else if ($status == 1) {
            return 'badge badge-light-primary fs-8 fw-bolder';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function scopeUserCustomers($q, $id = null)
    {
        $id = $id ?? auth()->user()->id;
        return $q->where('user_id', $id);
    }


}
