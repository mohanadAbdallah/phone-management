<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;
    protected $fillable =['id', 'text', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeUserWarnings($q, $id = null)
    {
        $id = $id ?? auth()->user()->id;
        return $q->where('user_id', $id);
    }
}
