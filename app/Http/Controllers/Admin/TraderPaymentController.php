<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\traderPaymentRequest;
use App\Models\TraderPayment;
use Illuminate\Http\Request;
use function redirect;

class TraderPaymentController extends Controller
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
    public function store(traderPaymentRequest $request , $id)
    {

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TraderPayment  $traderPayment
     * @return \Illuminate\Http\Response
     */
    public function show(TraderPayment $traderPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TraderPayment  $traderPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(TraderPayment $traderPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TraderPayment  $traderPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TraderPayment $traderPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TraderPayment  $traderPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TraderPayment $traderPayment)
    {
        //
    }
}
