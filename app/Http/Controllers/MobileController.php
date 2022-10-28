<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePremiumRequest;
use App\Models\Alert;
use App\Models\Customer;
use App\Models\Mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    public function index()
    {
        $mobile = Mobile::UserMobiles()->with('customer','mobile_payments')
            ->orderBy('status','asc')->get();

        return view('admin.mobile.index',compact('mobile'))->with('i');

    }
    public function showNotificaton()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('showNotification', compact('notifications'));
    }
    public function getUnreadNotification($id)
    {
        $notifications = auth()->user()->unreadNotifications;
        $notificationsCount = count($notifications);

        if (count($notifications) != 0) {
            $response = [
                'code' => 200,
                'success' => true,
                'count' => $notificationsCount,
                'notifications' => $notifications,
            ];
        } else {

            $response = [
                'code' => 404,
                'success' => false,
            ];
        }
        return response()->json($response);
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function create()
    {
        return view('admin.mobile.create');
    }

    public function store(StorePremiumRequest $request)
    {
      $customer = auth()->user()->customers()->create($request->validated());
      $mobile= $customer->mobile()->create(
          [
              'mobile_name'=>$request->mobile_name,
              'type'=>$request->type,
              'salary'=>$request->salary,
              'residual'=>$request->salary,
              'created_at'=>$request->created_at,
              'notes'=>$request->notes,
              'date'=>$request->created_at,
              'user_id'=>auth()->user()->id,
          ]);

        $mobile->customer()->update([
            'mobile_id'=>$mobile->id,
        ]);

        return redirect()->route('customers.showPayments',$customer->id)->withSuccessMessage(__('app.successfully_added'));
    }

}
