<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePremiumRequest;
use App\Models\Mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function __;
use function auth;
use function redirect;
use function response;
use function view;

class MobileController extends Controller
{

    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $mobile = Mobile::UserMobiles()->with('customer','mobile_payments')
            ->where('status',0)
            ->orderBy('status','asc')->get();

        return view('admin.mobile.index',compact('mobile','notifications'))->with('i');

    }

    public function edit(Mobile $mobile)
    {
        return view('admin.mobile.edit',compact('mobile'));

    }
    public function update(Request $request , Mobile $mobile)
    {
        $input = $request->all();
        if (!$mobile->mobile_payments){
            $input['residual']=$input['salary'];
        }
        else{
            $totalPayments =null;
            foreach ($mobile->mobile_payments as $item){
                $totalPayments += $item->payment;
            }
            $input['residual']= $input['salary'] - $totalPayments;
        }

        $mobile->update($input);

        return redirect()->route('mobiles.index')->withSuccessMessage(__('app.successfully_edited'));

    }
    public function expired(){

        $expired_premiums_salary = Mobile::UserMobiles()->where('status',1)
        ->where('date', '>=', Carbon::now()->subMonths(6)->toDateTimeString())->sum('salary');

        $mobile = Mobile::UserMobiles()->with('customer','mobile_payments')
            ->where('status',1)
            ->orderBy('status','asc')->get();

        return view('admin.mobile.expired_mobile',compact('mobile','expired_premiums_salary'))->with('i');
    }
    public function showNotificaton()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('showNotification', compact('notifications'));
    }
    public function getUnreadNotification($id)
    {
        $notifications = auth()->user()->unreadNotifications;
        $notificationsCount = count($notifications);

        if (count($notifications) != 0) {
            $response = [
                'code' => 200,
                'success' => true,
                'count' => $notificationsCount,
                'notifications' => $notifications,
            ];
        } else {

            $response = [
                'code' => 404,
                'success' => false,
            ];
        }
        return response()->json($response);
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function create()
    {
        return view('admin.mobile.create');
    }

    public function store(StorePremiumRequest $request)
    {
        $validated_data= $request->validated();
        $validated_data['alternative_phone']=$request->alternative_phone;
        $validated_data['identity']=$request->identity;


      $customer = auth()->user()->customers()->create($validated_data);
      $mobile= $customer->mobile()->create(
          [
              'mobile_name'=>$request->mobile_name,
              'type'=>$request->type,
              'salary'=>$request->salary,
              'residual'=>$request->salary,
              'created_at'=>$request->created_at,
              'notes'=>$request->notes,
              'date'=>$request->created_at,
              'user_id'=>auth()->user()->id,
          ]);

        $mobile->customer()->update([
            'mobile_id'=>$mobile->id,
        ]);
        return redirect()->route('customers.showPayments',$customer->id)->withSuccessMessage(__('app.successfully_added'));
    }

}
