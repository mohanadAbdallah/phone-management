<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraderPayment extends Model
{
    use HasFactory;
    protected $fillable= ['payment','description','trader_id','status','created_at'];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
