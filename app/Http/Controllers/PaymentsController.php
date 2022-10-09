<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsRequest;
use App\Models\Mobile;
use App\Models\mobile_payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $mobile->update([
            'date'=>$request->created_at,
        ]);
        return redirect()->back()->with(['success'=>'تمت إضافة الدفعة بنجاح']);
    }
    public function requiredPayment()
    {
        $mobilePayments = Mobile::with('mobile_payments')
            ->where('date', '<=', Carbon::now()->subDays(30)->toDateTimeString())
            ->get();

        return view('admin.payments.requiredPayments',compact('mobilePayments'))->with('i');

    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = mobile_payment::find($id);
        $payment->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    }
}
