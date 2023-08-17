<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable =['name','type','color','price','user_id','image','storage','ram','description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
