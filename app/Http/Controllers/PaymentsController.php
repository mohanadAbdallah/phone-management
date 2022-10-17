<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsRequest;
use App\Models\Mobile;
use App\Models\mobile_payment;
use App\Notifications\ExpiredMobileNotification;
use App\Notifications\requiredPaymentNotification;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentsRequest $request , $id)
    {
        $mobile=Mobile::with('mobile_payments')->find($id);
        $mobile->mobile_payments()->create($request->validated());

        $mobile->update(['date'=>$request->created_at]);

        if ($mobile->residual <= 0){
            auth()->user()->notify(new ExpiredMobileNotification($mobile));
        }

        return redirect()->back()->withSuccessMessage('تمت إضافة الدفعة بنجاح');

    }
    public function requiredPayment()
    {
        $user = \App\Models\User::find(1);
        $mobilePayments = Mobile::UserActiveMobiles()->with('mobile_payments')
            ->where('date', '<=', Carbon::now()->subDays(30)->toDateTimeString())
            ->get();


        return view('admin.payments.requiredPayments',compact('mobilePayments'))->with('i');

    }

    public function send_notification()
    {
        $user = \App\Models\User::find(1);
        $mobilePayments = Mobile::UserMobiles()->with('mobile_payments')
            ->where('date', '<=', Carbon::now()->subDays(30)->toDateTimeString())
            ->get();
    }


    public function destroy($id)
    {
        $payment = mobile_payment::find($id);
        $payment->delete();
        return redirect()->back()->withSuccessMessage(__('app.successfully_deleted'));

    }
}
