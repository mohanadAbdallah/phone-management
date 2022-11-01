<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Setting;
use App\Models\Warning;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();

        $about = $settings->where('key', '=', 'about')->first();
        $privacy_policy = $settings->where('key', '=', 'privacy_policy')->first();
        $phone = $settings->where('key', '=', 'phone')->first();
        $email = $settings->where('key', '=', 'email')->first();
        $facebook = $settings->where('key', '=', 'facebook')->first();
        $twitter = $settings->where('key', '=', 'twitter')->first();
        $snapchat = $settings->where('key', '=', 'snapchat')->first();
        $instagram = $settings->where('key', '=', 'instagram')->first();
        $youtube = $settings->where('key', '=', 'youtube')->first();
        $dateStarting = $settings->where('key', '=', 'dateStarting')->first();
        $iconInfo = $settings->where('key', '=', 'icon_info')->first();
        $orderFees = $settings->where('key', '=', 'order_fees')->first();





        parent::$data['about'] = $about;
        parent::$data['privacy_policy'] = $privacy_policy;
        parent::$data['phone'] = $phone;
        parent::$data['email'] = $email;
        parent::$data['facebook'] = $facebook;
        parent::$data['twitter'] = $twitter;
        parent::$data['snapchat'] = $snapchat;
        parent::$data['instagram'] = $instagram;
        parent::$data['youtube'] = $youtube;
        parent::$data['dateStarting'] = $dateStarting;
        parent::$data['icon_info'] = $iconInfo;
        parent::$data['order_fees'] = $orderFees;



        return view('admin.settings.index', parent::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function warning()
    {
        $data = Warning::UserWarnings()->first();
        return view('admin.settings.Warnings.paradigm',compact('data'));
    }
    public function update_warning(Request $request , $id)
    {
        $data = Warning::updateorcreate(
        [
            'id' => $id,
        ],
        [
            'id' => $id,
            'user_id'=>auth()->user()->id,
            'text' => $request->text,
        ]
    );
        return back();

    }
    public function create()
    {
        //
    }

    public function paradigm()
    {
        return view('admin.settings.Warnings.paradigm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $privacy_policy = Setting::firstorcreate(['key'=>'privacy_policy'],['key'=>'privacy_policy','value'=>111111111,'value_ar'=>111111111,'value_en'=>111111111]);
        $about = Setting::firstorcreate(['key'=>'about'],['key'=>'about','value_ar'=>111111111,'value_en'=>111111111]);
        $phone = Setting::firstorcreate(['key'=>'phone'],['key'=>'phone','value_ar'=>111111111,'value_en'=>111111111]);
        $email = Setting::firstorcreate(['key'=>'email'],['key'=>'email','value_ar'=>111111111,'value_en'=>111111111]);
        $facebook = Setting::firstorcreate(['key'=>'facebook'],['key'=>'facebook','value_ar'=>111111111,'value_en'=>111111111]);
        $twitter = Setting::firstorcreate(['key'=>'twitter'],['key'=>'twitter','value_ar'=>111111111,'value_en'=>111111111]);
        $snapchat = Setting::firstorcreate(['key'=>'snapchat'],['key'=>'snapchat','value_ar'=>111111111,'value_en'=>111111111]);
        $instagram = Setting::firstorcreate(['key'=>'instagram'],['key'=>'instagram','value_ar'=>111111111,'value_en'=>111111111]);
        $youtube = Setting::firstorcreate(['key'=>'youtube'],['key'=>'youtube','value_ar'=>111111111,'value_en'=>111111111]);
        $whatsapp = Setting::firstorcreate(['key'=>'whatsapp'],['key'=>'whatsapp','value_ar'=>111111111,'value_en'=>111111111]);
        $dateStarting = Setting::firstorcreate(['key'=>'dateStarting'],['key'=>'dateStarting','value_ar'=>111111111,'value_en'=>111111111]);
        $offerPrice = Setting::firstorcreate(['key'=>'offer_price'],['key'=>'offer_price','value_ar'=>200,'value_en'=>200]);
        $iconInfo = Setting::firstorcreate(['key'=>'icon_info'],['key'=>'icon_info','value_ar'=>200,'value_en'=>200]);
        $workHours = Setting::firstorcreate(['key'=>'work_hours'],['key'=>'work_hours','value_ar'=>111111111,'value_en'=>111111111]);
        $orderFees= Setting::firstorcreate(['key'=>'order_fees'],['key'=>'order_fees','value_ar'=>111111111,'value_en'=>111111111]);




        return view('admin.settings.data_settings.edit', compact('privacy_policy','about'
            , 'about', 'phone', 'email', 'facebook', 'twitter','snapchat','instagram','youtube','whatsapp','dateStarting'
            ,'offerPrice','iconInfo','workHours','orderFees'


        ));

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

        $privacy_policy = Setting::firstorcreate(['key'=>'privacy_policy'],['key'=>'privacy_policy','value'=>111111111,'value_ar'=>111111111,'value_en'=>111111111]);
        $privacy_policy->value_ar = $request->privacy_policy_ar;
        $privacy_policy->value_en = $request->privacy_policy_en;
        $privacy_policy->save();
        $about = Setting::firstorcreate(['key'=>'about'],['key'=>'about','value'=>111111111,'value_ar'=>111111111,'value_en'=>111111111]);
        $about->value_ar = $request->about_ar;
        $about->value_en = $request->about_en;
        $about->save();
        $phone = Setting::firstorcreate(['key'=>'phone'],['key'=>'phone','value'=>111111111]);
        $phone->value_ar = $request->phone;
        $phone->value_en = $request->phone;
        $phone->save();
        $email = Setting::firstorcreate(['key'=>'email'],['key'=>'email','value'=>111111111]);
        $email->value_ar = $request->email;
        $email->value_en = $request->email;
        $email->save();
        $facebook = Setting::firstorcreate(['key'=>'facebook'],['key'=>'facebook','value'=>111111111]);
        $facebook->value_ar = $request->facebook;
        $facebook->value_en = $request->facebook;
        $facebook->save();
        $twitter = Setting::firstorcreate(['key'=>'twitter'],['key'=>'twitter','value'=>111111111]);
        $twitter->value_ar = $request->twitter;
        $twitter->value_en = $request->twitter;
        $twitter->save();
        $snapchat = Setting::firstorcreate(['key'=>'snapchat'],['key'=>'snapchat','value'=>111111111]);
        $snapchat->value_ar = $request->snapchat;
        $snapchat->value_en = $request->snapchat;
        $snapchat->save();
        $instagram = Setting::firstorcreate(['key'=>'instagram'],['key'=>'instagram','value'=>111111111]);
        $instagram->value_ar = $request->instagram;
        $instagram->value_en = $request->instagram;
        $instagram->save();
        $youtube = Setting::firstorcreate(['key'=>'youtube'],['key'=>'youtube','value'=>111111111]);
        $youtube->value_ar = $request->youtube;
        $youtube->value_en = $request->youtube;
        $youtube->save();
        $whatsapp = Setting::firstorcreate(['key'=>'whatsapp'],['key'=>'whatsapp','value'=>111111111]);
        $whatsapp->value_ar = $request->whatsapp;
        $whatsapp->value_en = $request->whatsapp;
        $whatsapp->save();
        $dateStarting = Setting::firstorcreate(['key'=>'dateStarting'],['key'=>'dateStarting','value'=>111111111]);
        $dateStarting->value_ar = $request->dateStarting;
        $dateStarting->value_en = $request->dateStarting;
        $dateStarting->save();
        $offerPrice = Setting::firstorcreate(['key'=>'offer_price'],['key'=>'offer_price','value'=>200]);
        $offerPrice->value_ar = $request->offer_price;
        $offerPrice->value_en = $request->offer_price;
        $offerPrice->save();
        $iconInfo = Setting::firstorcreate(['key'=>'icon_info'],['key'=>'icon_info','value'=>200]);
        if ($request->hasFile('icon_info')) {
            $iconInfo->value_ar = $request->icon_info->store('public/icon_info');
            $iconInfo->value_en = $request->icon_info->store('public/icon_info');
        }
        $iconInfo->save();
        $workHours = Setting::firstorcreate(['key'=>'work_hours'],['key'=>'work_hours','value'=>111111111]);
        $workHours->value_ar = $request->work_hours;
        $workHours->value_en = $request->work_hours;
        $workHours->save();
        $orderFees = Setting::firstorcreate(['key'=>'order_fees'],['key'=>'order_fees','value'=>111111111]);
        $orderFees->value_ar = $request->order_fees;
        $orderFees->value_en = $request->order_fees;
        $orderFees->save();


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

