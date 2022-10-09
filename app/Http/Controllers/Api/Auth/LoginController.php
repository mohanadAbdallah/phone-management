<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\Validate;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'mobile' => 'required',
            'password' => 'required|min:6',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $customer = Customer::where('mobile', $request->mobile)->first();
        if ($customer) {
            $customer-> user_agent=$request->user_agent;
            $customer->save();
            if (Hash::check($request->password, $customer->password)) {
                $token = $customer->createToken('TripleQ Registration token')->plainTextToken;
                return response()->json(['data' => $customer, 'token' => $token, 'status' => true, 'message' => 'success'], 200);
            }
        }
        return response()->json(['message' => 'invalid username or password', 'status' => false], 422);

    }

    public function socialiteLoginCustomer(Request $request)
    {
        $rules = [
            'access_token' => 'required',
            'provider_id' => 'required',
            'provider' => 'required',
            'email' => 'required',
        ];
        $validator = Validate::validateRequest($request, $rules);
        if ($validator != 'valid') return $validator;

        $customer = Customer::where('provider', $request->provider)->where('provider_id', $request->provider_id)->where('email', $request->email)->first();
        if (!$customer) {

            $responseCustomer = Socialite::driver($request->provider)->userFromToken($request->access_token);

            $customer = Customer::where('email', $responseCustomer->user['email'])->first();
            if ($customer)
                return response()->json(['errors' => ['Email is unique'], 'status' => false], 422);

            $customer = new Customer();
            $customer->mobile = $responseCustomer->user['email'];
            $customer->email = $responseCustomer->user['email'];
            $customer->name = $responseCustomer->user['name'];
            $customer->password = Hash::make(mt_rand(100000, 999999));
            $customer->email_verified_at = Carbon::now();
            $customer->provider = $request->provider;
            $customer->provider_id = $request->provider_id;
            $customer->access_token = $request->access_token;
            $customer->otp_verify = 1;
            $customer->save();
        };

        $token = $customer->createToken($customer->mobile . ' TripleQ Login token')->plainTextToken;
        return response()->json(['data' => $customer, 'token' => $token, 'status' => true], 200);

    }
}
