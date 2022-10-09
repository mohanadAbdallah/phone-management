<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\AppointmentReservation;
use App\Models\Reservation;
use App\Models\Vehicle;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

class ReservationController extends Controller
{

    public function showReservation(){
        $customer_id = auth('sanctum')->user()->id;
        $reservation =  Reservation::where('customer_id',$customer_id)->paginate(10);
        if ($reservation)
            return response()->json(['data' => $reservation, 'status' => true, 'message' => 'تم العرض بنجاح'], 200);
        else
            return response()->json(['data' => $reservation, 'status' => false, 'message' => 'فشل العرض'], 422);

    }
    public function makeReservation(Request $request){
        $rules =[
            'from_date' => 'required',
            'to_date' => 'required',
            'vehicle_id' => 'required',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;
        $customer_id = auth('sanctum')->user()->id;
        $startDate = Carbon::parse($request->from_date);
        $endDate =  Carbon::parse($request->to_date);
        DB::beginTransaction();
        $reservation = new Reservation();
        $reservation->customer_id = $customer_id;
        $reservation->from_date = $request->from_date;
        $reservation->to_date = $request->to_date;
        $reservation->vehicle_id = $request->vehicle_id;
        $reservation->delivery_branch_id = $request->delivery_branch_id;
        $reservation->receiving_branch_id = $request->receiving_branch_id;
        $reservation->status = 0;
        $reservation->booking_type = $request->booking_type;
        $reservation->save();
        $days =  $reservation->to_date->diffInDays( $reservation->from_date);
        $reservation->rental_range = $days;
        $reservation->reservation_number = $customer_id . '/' . str_pad($reservation->id + 1, 6, "0", STR_PAD_LEFT);
        mt_rand(10000, 99999);
        $reservation->price = $reservation->vehicle->price;

        $reservation->save();
        for ($i = 0; $i <= $endDate->diffInDays($startDate); $i++) {
            $nextDay = $startDate->addDays($i);
            $isReservedBefore = AppointmentReservation::whereDate('reservation_dayt',$nextDay)->where('vehicle_id',$request->vehicle_id)->first();
            if ($isReservedBefore)  return response()->json([ 'status' => false, 'message' => 'محجوز بالفعل'], 422);
            $appointmentReservation = new AppointmentReservation();
            $appointmentReservation->customer_id = $customer_id;
            $appointmentReservation->vehicle_id = $request->vehicle_id;
            $appointmentReservation->reservation_id = $reservation->id;
            $appointmentReservation->reservation_dayt = $nextDay;
            $appointmentReservation->save();
        }
        DB::commit();
        return response()->json(['data' => $reservation, 'status' => true, 'message' => 'تم انشاء الطلب بنجاح'], 200);


    }
    public function  editReservation(Request $request,$id){
        $reservation = Reservation::find($id);
        if ($reservation) {
            $reservation->number_people = $request->number_people;
            $reservation->date = $request->date;
            $reservation->time = $request->time;
            $reservation->status = $request->status;
            $reservation->booking_type = $request->booking_type;
            $reservation->table_number = $request->table_number;
            $reservation->save();
            return response()->json(['data' => $reservation, 'status' => true, 'message' => 'تم تعديل الحجز بنجاح'], 200);
        }
        return response()->json(['status' => false, 'message' => 'فشل تعديل الحجز '], 422);

    }
    public function  deleteReservation($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        return response()->json(['data' => $reservation, 'status' => true, 'message' => 'تم الحذف'], 200);
    }
    public function  cancelReservation($id){
        $reservation = Reservation::where('status',0)->find($id);
        if ($reservation) {
            $reservation->update([
                'status' => 1
            ]);
            return response()->json(['data' => $reservation, 'status' => true, 'message' => 'تم الغاء الحجز'], 200);
        }
        return response()->json([ 'status' => false, 'message' => 'لا يمكنك الالغاء'], 422);

    }





}
