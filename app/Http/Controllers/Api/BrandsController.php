<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function getBrands(){

        $brands= Brand::orderby('order','asc')->paginate(10);;
        if (!$brands)
            return response()->json(['data' => $brands, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $brands , 'status' => true, 'message' => 'تم العرض'], 200);

    }
}
