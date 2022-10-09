<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function makeAddresses(Request $request)
    {

        $rules = [
            'lat' => 'required',
            'long' => 'required'

        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator !== 'valid') return $validator;
        $address = new Address();
        $address->customer_id = auth('sanctum')->user()->id;
        $address->lat =$request->lat;
        $address->long =$request->long;
        $address->titel =$request->titel;
        $address->describe =$request->describe;
        $address->save();
        return response()->json(['data' => $address ,'status'=>true,'message' => 'تم اضافة العنوان'], 200);
    }

    public function updateAddresses(Request $request)
    {
        $rules = [
            'lat' => 'required',
            'long' => 'required'
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator !== 'valid') return $validator;


        $address = Address::find($request->address_id);
        if (!$address) return response()->json(['message' => 'Address not found', 'status' => false], 422);

        $address->lat =$request->lat;
        $address->long =$request->long;
        $address->titel =$request->titel;
        $address->describe =$request->describe;
        $address->save();
        $addressCustomer = auth('sanctum')->user()->address()->orderBy('id', 'desc')->first();
        return response()->json(['data' => $addressCustomer,'message' => 'تم التعديل العنوان  بنجاح', 'status' => true], 200);
    }

    public function removeAddresses($id)
    {
        $address= Address::destroy($id);
        if (!$address) return response()->json(['message' => 'Address not found', 'status' => false], 200);

        $addressUser = auth('sanctum')->user()->address()->where('status', 0)->orderBy('id', 'desc')->first();

        return response()->json(['data' => $addressUser,'message'=>'تم الحذف بنجاح', 'status' => true], 200);
    }

    public function showListAddresses()
    {
        $address = auth('sanctum')->user()->address()->orderBy('id', 'desc')->get();
        if (count($address) == 0)
            return response()->json(['message' => 'No Address added before yet!', 'status' => true], 200);

        return response()->json(['data' => $address,'message' => 'تم الحذف بنجاح','status' => true], 200);
    }

}
