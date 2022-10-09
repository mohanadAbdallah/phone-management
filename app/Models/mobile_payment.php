<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobile_payment extends Model
{
    use HasFactory;
    protected $fillable= ['payment','description','mobile_id','status','created_at'];

}
