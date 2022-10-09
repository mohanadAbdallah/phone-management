<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getData(){
        $data=Setting::get();
        if (!$data)
            return response()->json(['data' => $data, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $data , 'status' => true, 'message' => 'تم العرض'], 200);

    }
}
