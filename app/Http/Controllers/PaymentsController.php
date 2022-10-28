<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsRequest;
use App\Models\Mobile;
use App\Models\mobile_payment;
use App\Notifications\ExpiredMobileNotification;
use Carbon\Carbon;


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
        $resid = $mobile->residual - $request->payment;
        $mobile->update(['residual'=>$resid]);
        $mobile->mobile_payments()->create($request->validated());

        $mobile->update(['date'=>$request->created_at]);

        if ($mobile->residual <= 0){
            $mobile->update(['status'=>1]);
            auth()->user()->notify(new ExpiredMobileNotification($mobile));
        }

        return redirect()->back()->withSuccessMessage('تمت إضافة الدفعة بنجاح');

    }
    public function requiredPayment()
    {
        $user = \App\Models\User::find(1);
        $mobilePayments = Mobile::UserActiveMobiles()->with('mobile_payments','customer')
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

    public function deleteAllPayments(Mobile $mobile)
    {
        mobile_payment::where('mobile_id',$mobile->id)->delete();

        return redirect()->back()->withSuccessMessage(__('app.successfully_deleted'));
    }
    public function destroy($id)
    {
        $payment = mobile_payment::find($id);
        $mobile = Mobile::where('id',$payment->mobile_id)->get();

        foreach ($mobile as $item){
           $resid = $item->residual + $payment->payment;

            $item->update([
                    'residual' => $resid,
                    'status' => 0 ]
            );
        }

        $payment->delete();
        return redirect()->back()->withSuccessMessage(__('app.successfully_deleted'));

    }
}
