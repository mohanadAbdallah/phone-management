<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\AnswerSecurityQuestion;
use App\Models\Customer;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $rules =[
            'password' => 'required|min:6|confirmed',
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile|numeric|min:10',
            'question_id' => 'required',
            'answer' => 'required',
        ];

        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;
        //$cityId = request()->header('city-id');
        $customer= new Customer();
        $customer->name = $request->name;
        $customer->mobile_code = '972';
        $customer->mobile = $request->mobile;
        $customer->password =  Hash::make($request->password);
        $customer->email = $request->email;
        $customer->otp_code = 1234;
        $customer->otp_verify = 0;
        if ($request->file('img') and   $request->img != null) {
            $customer->img = $request->img->store('public/customer');
        }
        $customer->save();

        if($customer){
            $token = $customer->createToken('TrpileQ Registration token')->plainTextToken;

            return response()->json(['data' => $customer, 'token' => $token, 'status' => true, 'message' => 'تم انشاء حساب جديد'], 200);
        }
        else {
            return response()->json(['message' => 'رقم الجوال  موجود من قبل ', 'status' => false], 422);
        }

    }
}
