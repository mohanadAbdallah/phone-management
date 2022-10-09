<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value_ar',
        'value_en',

    ];
    protected $hidden = [
        'value_ar',
        'value_en',
        'name_en',
        'name_er',


    ];


    protected $appends =[
        'value',
    ];
    public function getValueAttribute()
    {
        if (app()->getLocale() == 'en')
            return $this->value_en;
        else
            return $this->value_ar;
    }
}
