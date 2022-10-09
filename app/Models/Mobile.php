<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;
    protected $fillable = ['mobile_name','type','salary','residual','customer_id','created_at'];

    protected $appends=['residual'];

    public function mobile_payments()
    {
        return $this->hasMany(mobile_payment::class);
    }
    public function getResidualAttribute()
    {
        $residual = $this->salary;
        foreach ($this->mobile_payments as $mobile_payments) {
            $residual -= $mobile_payments->payment;
        };
        return $residual;
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
