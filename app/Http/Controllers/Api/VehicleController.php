<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\AppointmentReservation;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleRating;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getVehicles(){

        $vehicle= Vehicle::orderby('order','asc')->paginate(20);
        if (!$vehicle)
            return response()->json(['data' => $vehicle, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $vehicle , 'status' => true, 'message' => 'تم العرض'], 200);

    }
    public function showVehicle(Request $request){

        $vehicle= Vehicle::where('id',$request->vehicle_id)->orderby('order','asc')->first() ;
        if (!$vehicle)
            return response()->json(['data' => $vehicle, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $vehicle , 'status' => true, 'message' => 'تم العرض'], 200);

    }
    public function getBrandVehicles(Request $request){
  if ($request->brand_id==0){
      $vehicles= Vehicle::paginate(20);
      if (!$vehicles)
          return response()->json(['data' => $vehicles, 'status' => false, 'message' => 'فشل العرض'], 422);
      else
          return response()->json(['data' => $vehicles , 'status' => true, 'message' => 'تم العرض'], 200);
  }
  else {
      $vehicles = Vehicle::where('brand_id', $request->brand_id)->paginate(20);
      if (!$vehicles)
          return response()->json(['data' => $vehicles, 'status' => false, 'message' => 'فشل العرض'], 422);
      else
          return response()->json(['data' => $vehicles, 'status' => true, 'message' => 'تم العرض'], 200);
  }
    }

    public function favorites(Request $request)
    {

        $favorite = auth('sanctum')->user()->favorites()->with('vehicle')->get();
        if ($favorite)
            return response()->json(['data' => $favorite, 'status' => true, 'message' => 'تم العرض'], 200);
        else
            return response()->json(['data' => $favorite, 'status' => false, 'message' => 'لا يوجد اصناف'], 422);

    }
    public function addVehicleToFavorites(Request $request)
    {
        if (!auth('sanctum')->user())
            return response()->json(['message' => 'لا يستطيع الزائر ازالة عرض من المفضلة'], 422);
        $rules = [
            'vehicle_id' => 'required'
        ];
        $messages = [
            'vehicle_id.required' => 'حقل رقم المنتج مطلوب'
        ];
        $validator = Validate::validateRequest($request, $rules, $messages);
        if ($validator !== 'valid') return $validator;

        $vehicle = Vehicle::find($request->vehicle_id);
        if (!$vehicle)
            return response()->json(['message' => 'المركبة غير موجودة','status'=>false], 422);

        $favorite = auth('sanctum')->user()->favorites->where('vehicle_id', $request->vehicle_id)->first();
        if ($favorite)
            return response()->json(['message' => 'لا يمكن اضافة المركبة مرة اخرى للمفضلة' ,'status'=>false], 422);
        $customerId = auth('sanctum')->user();
        $favorite = auth('sanctum')->user()->favorites()->create(['vehicle_id' => $request->vehicle_id,'customer_id'=>$customerId->id]);

        return response()->json(['data' => $favorite,'message' => 'تم بنجاح','status'=>true], 200);
    }
    public function removeVehicleFromFavorites(Request $request)
    {
        if (!auth('sanctum')->user())
            return response()->json(['message' => 'لا يستطيع الزائر ازالة المركبة من المفضلة'], 422);
        $rules = [
            'vehicle_id' => 'required'
        ];
        $messages = [
            'vehicle_id.required' => 'حقل رقم المركبة مطلوب'
        ];
        $validator = Validate::validateRequest($request, $rules, $messages);
        if ($validator !== 'valid') return $validator;

        $vehicle = Vehicle::find($request->vehicle_id);
        if (!$vehicle)
            return response()->json(['message' => 'المركبة غير موجودة' ,'status'=>false], 422);

        $favorite = auth('sanctum')->user()->favorites()->where('vehicle_id', $request->vehicle_id)->first();
        if (!$favorite)
            return response()->json(['message' => 'المركبة غير مضافة إلى المفضلة' ,'status'=>false], 422);

        $favorite->delete();
        return response()->json(['message' =>  'تمت إزالة المركبة من المفضلة','status'=>true], 200);
    }


    public function makeVehicleRating(Request $request ,$id){

        if (!auth('sanctum')->user())
            return response()->json(['message' => 'لا يستطيع الزائر ازالة عرض من المفضلة'], 422);
        $customer=auth('sanctum')->user();

        $vehicleRating = Vehicle::where('customer_id',$customer->id)->where('vehicle_id',$id)->firstorcreate();
        $vehicleRating->vehicle_id = $id;
        $vehicleRating->customer_id = $customer->id;
        $vehicleRating->rating = $request->rate_value;
        $vehicleRating->note = $request->note ;
        $vehicleRating->save();
        $vehicle=Vehicle::where('id',$vehicleRating->vehicle_id)->first();
        $rating = VehicleRating::where('vehicle_id',$vehicle->id)->get();
        $totalRating =0;
        foreach ($rating as $item) {
            $totalRating += $item->rating;
        }
        $count =VehicleRating::where('product_id',$vehicle->id)->get()->count();
        $vehicle->rating=$totalRating/$count;
        $vehicle->save();
        if (!$vehicleRating)
            return response()->json(['data' => $vehicleRating, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $vehicleRating , 'status' => true, 'message' => 'تم العرض'], 200);

    }
    public function getMyRatingVehicle(Request  $request,$id){

        if (!auth('sanctum')->user())
            return response()->json(['message' => 'لا يستطيع الزائر التقييمات'], 422);
        $customer=auth('sanctum')->user();

        $vehicleRating= VehicleRating::where('customer_id',$customer->id)->where('product_id',$id)->first();

        if (!$vehicleRating)
            return response()->json(['data' => $vehicleRating, 'status' => false, 'message' => 'فشل العرض'], 422);
        else
            return response()->json(['data' => $vehicleRating , 'status' => true, 'message' => 'تم العرض'], 200);



    }
    public function filterVehicle(Request  $request){
        $startDate = Carbon::parse($request->from_date);
        $endDate =  Carbon::parse($request->to_date);
        $filterVehicle = Vehicle::query();
        if (request()->get('price_from') != '' && request()->get('price_to') != '') {
            $filterVehicle->whereBetween('price', [request()->get('price_from') , request()->get('price_to')]);
        }
        if (request()->get('gear') != '') {
           $filterVehicle->where('gear', request()->get('gear'));
        }
        if (request()->get('city_id') != '') {
           $filterVehicle->where('city_id', request()->get('city_id') );
        }
        if ($startDate != ''&& $endDate != '') {
            for ($i = 0; $i <= $endDate->diffInDays($startDate); $i++) {
                $nextDay = $startDate->addDays($i);
                $isReservedBefore = AppointmentReservation::whereDate('reservation_dayt',$nextDay)->first();
                if ($isReservedBefore)
                    $filterVehicle->whereNotIn('id', [$isReservedBefore->vehicle_id ]);
            }

        }
        if (request()->get('vehicle_type_id') != '') {
        $vehicleTypeId[] = $request->vehicle_type_id;
        foreach ($vehicleTypeId as $item) {
            foreach ($item as $i) {
                $filterVehicle->orWhere('vehicle_type_id', $i);
            }
        }
    }
        if (request()->get('brand_id') != '') {
        $brandId[] = $request->brand_id;
        foreach ($brandId as $item) {
            foreach ($item as $i) {
                $filterVehicle->orWhere('brand_id', $i);
            }
        }
    }
   if (request()->get('manufacture_history') != '') {
        $manufactureHistory[] = $request->manufacture_history;
        foreach ($manufactureHistory as $item) {
            foreach ($item as $i) {
                $filterVehicle->orWhere('manufacture_history', $i);
            }
        }
    }

        $data = $filterVehicle->paginate(20);

        if (!$data){
            return response()->json(['data' => $data, 'status' => false, 'message' => 'فشل العرض'], 422);
        }
        return response()->json(['data' => $data, 'status' => true, 'message' => 'تم العرض'], 200);
    }



}
