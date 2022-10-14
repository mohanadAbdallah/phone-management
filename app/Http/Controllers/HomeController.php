<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;

class HomeController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;

        $data = [
            'customer'=>Customer::UserCustomers()->count(),
            'mobile'=>Mobile::UserMobiles()->where('status',0)->count(),
            'total'=>Mobile::UserMobiles()->where('status',0)->sum('salary'),
            'expired_premiums'=>Mobile::UserMobiles()->where('status',1)->get()->count(),
            'residual'=>Mobile::UserMobiles()->get()->sum('residual'),
            'required_payments'=>Mobile::UserMobiles()->with('mobile_payments')
                ->where('date', '<=', Carbon::now()->subDays(30)->toDateTimeString())
                ->get()->count(),
            ];


        return view('home',compact('notifications'))->with($data);

    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotification
            ->when($request->input('id'),function ($query) use ($request){
                return $query->where('id',$request->input('id'));
            })->markAsRead();
        return response()->noContent();

    }
}
