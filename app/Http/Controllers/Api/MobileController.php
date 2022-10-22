<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Validate;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePremiumRequest;
use App\Models\Customer;
use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends ApiController
{
    public function index()
    {
        $mobile = Mobile::with('customer')->get();
        return $this->showAll($mobile);
    }

    public function show(Mobile $mobile)
    {
        return $this->showOne($mobile);
    }

    public function store(Request $request)
    {
        $rules = [
            'customer_name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'identity'=>'required|numeric',
            'mobile_name'=>'required',
            'type'=>'required',
            'salary'=>'required|numeric',
        ];

        $validator = Validate::validateRequest($request, $rules);

        if ($validator != 'valid') return $validator;

        $customer = auth()->user()->customers()->create($request->all());

        $mobile= $customer->mobile()->create(
            [
                'mobile_name'=>$request->mobile_name,
                'type'=>$request->type,
                'salary'=>$request->salary,
                'created_at'=>$request->created_at,
                'notes'=>$request->notes,
                'date'=>$request->created_at,
                'user_id'=>auth()->user()->id,
            ]);

        $mobile->customer()->update([
            'mobile_id'=>$mobile->id,
        ]);

        return $this->showOne($mobile , 201 );

    }



    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Mobile $mobile)
    {
        $mobile->delete();
        return $this->showOne($mobile);

    }


}
