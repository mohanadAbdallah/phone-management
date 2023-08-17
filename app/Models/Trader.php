<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','type'];
    protected $appends = ['type_name'];

    public function getTypeNameAttribute()
    {
        if ($this->type ==0)
            return @trans('app.mobiles');
        elseif ($this->type ==1)
            return @trans('app.mobile_accessories');
        elseif ($this->type ==2)
            return @trans('app.display_screens');
    }
    public function mobile_payments()
    {
        return $this->hasMany(mobile_payment::class);
    }
    public function scopeUserTraders($q, $id = null)
    {
        $id = $id ?? auth()->user()->id;
        return $q->where('user_id', $id);
    }
}
