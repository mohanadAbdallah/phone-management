<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\AnswerSecurityQuestion;
use App\Models\Customer;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $rules =[
            'password' => 'required|min:6',
            'name' => 'required',
            'phone' => 'required|unique:users,phone|numeric|min:10',
            'email' => 'required|unique:users,email',
        ];

        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $user= new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->email = $request->email;

        if ($request->file('img') and   $request->img != null) {
            $user->img = $request->img->store('public/user');
        }
        $user->save();

        if($user){
            $token = $user->createToken('Registration token')->plainTextToken;

            return response()->json(['data' => $user, 'token' => $token, 'status' => true, 'message' => 'تم انشاء حساب جديد'], 200);
        }
        else {
            return response()->json(['message' => 'رقم الجوال  موجود من قبل ', 'status' => false], 422);
        }

    }
}
