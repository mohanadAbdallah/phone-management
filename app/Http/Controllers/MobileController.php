<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePremiumRequest;
use App\Models\Customer;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::has('mobile')->get();
        return view('admin.mobile.index',compact('customer'))->with('i');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobile.create');
    }

    public function store(StorePremiumRequest $request)
    {
      $customer = Customer::create($request->validated());
      $mobile= $customer->mobile()->create($request->validated());

        $mobile->customer()->update([
            'mobile_id'=>$mobile->id,
        ]);
        return redirect()->route('customers.showPayments',$customer->id)->with(['success'=>'تمت الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function show(Mobile $mobile)
    {
        //
    }
    public function showPayments($id)
    {
        $mobile = Mobile::with('mobile_payments')->find($id);
        return view('admin.mobile.showPayments',compact('mobile'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobile $mobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobile $mobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobile $mobile)
    {
        //
    }
}
