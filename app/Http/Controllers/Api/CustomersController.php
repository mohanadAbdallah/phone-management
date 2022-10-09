<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\AnswerSecurityQuestion;
use App\Models\Customer;
use App\Models\SecurityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    public function verifyQuestion(Request $request){

        $rules = [
            'question_id' => 'required',
            'answer' => 'required',
            'mobile' => 'required',

        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;



        $customerId=Customer::where('mobile',$request->mobile)->first();
        if (!$customerId) {
            return response()->json(['message' => 'Verification failed', 'status' => false], 422);
        }
        $answer = AnswerSecurityQuestion::where('question_id', $request->question_id)->where('answer', $request->answer)->where('customer_id', $customerId->id)->first();

        if (!$answer) {
            return response()->json(['message' => 'Verification failed', 'status' => false], 422);
        }
        else {
            $customer = Customer::where('id', $answer->customer_id)->first();


            $token = $customer->createToken('Graphic Town Registration token')->plainTextToken;
            return response()->json(['data' => $customer, 'token' => $token, 'message' => 'تم التحقق', 'status' => true], 200);
        }


    }
    public  function updateProfile ( Request $request){
        $rules = [
            'email' => 'required|unique:customers,email,' . auth()->user()->id,

        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;
        $userId=auth()->user()->id;
        $customer = Customer::find($userId);
        $customer->name = $request->name;
        $customer->mobile_code = '972';
        $customer->email = $request->email;
        if ($request->file('img') and   $request->img != null) {
            $customer->img = $request->img->store('public/customer');
        }
        $customer->save();
        return response()->json(["status" => true, "message" => "تم التعديل بنجاح بنجاح", "data" => $customer ],200);
    }
    public function updatePassword(Request $request)
    {
        $user = auth('sanctum')->user();
        $rules = [
            'password' => 'required|confirmed|min:6',
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;


        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['data' => $user,'message' => 'تم تغيير كلمة المرور', 'status' => true], 200);


    }
    public function sendOtpCode(Request $request)
    {
        $rules = [
            'mobile' => 'required',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $user = Customer::where('mobile', $request->mobile)->first();
        if($user){
            $otpCode = 1234;
            $user->otp_code = $otpCode;
            $user->save();
            return response()->json(['message' => 'تم التحقق بنجاح', 'otp_code'=>$otpCode,'data' => $user,  'status' => true], 200);
        }

        return response()->json(['message' => 'رقم الجوال غير متاح', 'status' => false], 422);


    }
    public function verifyOtpCode(Request $request)
    {
        $rules = [
            'mobile' => 'required',
            'otp_code' => 'required',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $user = Customer::where('mobile', $request->mobile)->where('otp_code', $request->otp_code)->first();
        if (!$user)
            return response()->json(['message' => 'Verification failed', 'status' => false], 422);

        $token = $user->createToken('Graphic Town Registration token')->plainTextToken;
        $user->otp_verify=1;
        $user->save();
        return response()->json(['data' => $user, 'token' => $token,'message' => 'تم التحقق', 'status' => true], 200);

    }
    public function forgotPassword(Request $request){
        $rules = [
            'password' => 'required|min:6|confirmed',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;
        $user = auth('sanctum')->user();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['data' => $user, 'message' => 'successfully', 'status' => true], 200);
    }
    public function getQuestion(){

        $question= SecurityQuestion::where('status',0)->get();
        if (!$question)
            return response()->json(['data' => $question, 'status' => false, 'message' => 'فشل العملية'], 422);
        else
            return response()->json(['data' => $question , 'status' => true, 'message' => 'تم العملية بنجاح'], 200);

    }
}
