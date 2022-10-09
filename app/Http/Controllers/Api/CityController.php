<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){

        $cities= City::get() ;
        if (!$cities)
            return response()->json(['data' => $cities, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $cities , 'status' => true, 'message' => 'تم العرض'], 200);

    }
    public function getbranchs(Request $request){

        $city= City::where('id',$request->city_id)->first() ;
        if (!$city)
            return response()->json(['data' => $city, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $city , 'status' => true, 'message' => 'تم العرض'], 200);

    }
}
