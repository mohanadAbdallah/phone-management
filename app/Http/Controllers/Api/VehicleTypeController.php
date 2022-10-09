<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function getVehicleTypes(){

        $vehicleType= VehicleType::orderby('order','asc')->paginate(20);;
        if (!$vehicleType)
            return response()->json(['data' => $vehicleType, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $vehicleType , 'status' => true, 'message' => 'تم العرض'], 200);

    }
}
