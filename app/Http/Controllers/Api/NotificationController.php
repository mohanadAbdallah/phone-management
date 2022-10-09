<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotificationData;
use App\Models\UserFcmToken;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function saveUserFcmToken(Request $request)
    {
        $getIsFoundToken = UserFcmToken::where('fcm_token', $request->fcm_token)->get();
        $countTokens = count($getIsFoundToken);
        if ($countTokens > 1) {
            foreach ($getIsFoundToken as $item) {
                $item->delete();
            }
            $countTokens = 0;
        }
        if ($countTokens == 0) {

            $fcmToken = new UserFcmToken();
            $fcmToken->fcm_token = $request->fcm_token;
            $fcmToken->mac_address = $request->mac_address ?? '';
            $fcmToken->device_id = $request->device_id ?? '';
            $fcmToken->user_agent =  $request->user_agent ;
            $fcmToken->customer_id = auth()->user()->id ;
            $fcmToken->save();
            return response()->json(["status" => true,'message' => 'تم بنجاح'], 200);
        }
        return response()->json(["status" => false,'message' => 'متكرر'], 422);

    }


    public function  positionNotification( Request  $request){
        $shopId = Auth::user()->id;
        $notificationData=NotificationData::where('customer_id',$shopId)->get();
        if ($notificationData) {
            foreach ($notificationData as $item){
                $notification = NotificationData::where('customer_id', $item->customer_id)->update(array(
                    'position' => 1,
                ));
            }
        }
        if ($notification) {
            return response()->json(['data' => $notification, 'status' => true, 'message' => 'تم قرأة الاشعار'], 200);
        }
        return response()->json(['data' => $notification, 'status' => false, 'message' => 'فشل'], 422);

    }

    public function getNotifications(){
        $customerId = Auth::user()->id;
        $notification=NotificationData::where('customer_id',$customerId)->orderBy('id', 'DESC')->paginate(10);
        $unread_notification=NotificationData::where('customer_id',$customerId)->where('position',2)->count();;
        return response()->json(['data'=>$notification,'unread_notification'=>$unread_notification ,'status' => true, 'message' => 'تم العرض بنجاح'], 200);
    }

    public function removeNotifications(Request $request){
        $notification=NotificationData::where('id',$request->notification_id)->delete();
        if ($notification)
            return response()->json(['status' => true, 'message' => 'تم حذف الاشعارات'], 200);

        return response()->json(['status' => false, 'message' => 'لا يوجد اشعارات للحذف '], 422);

    }

}
