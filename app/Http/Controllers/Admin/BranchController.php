<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch=Branch::get();
        return view('admin.branch.index',compact('branch'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::get();
        return view('admin.branch.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_ar' => 'required',
            'branch_lat' => 'required',
        ],
            [
                'name_ar.required'  => 'من فضلك قم بادخال اسم الفرع',
                'branch_lat.required'  => 'من فضلك قم بادخال احداثيات الفرع',

            ]);

        $branch= new Branch();
        $branch->name_ar=$request->name_ar;
        $branch->name_en=$request->name_en;
        $branch->city_id=$request->city_id;
        $branch->lat=$request->branch_lat;
        $branch->lng=$request->branch_long;
        $branch->save();
        return redirect(route('branch.index'))->with('info','تم اضافة الفرح بنجاح');
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
        Branch::find($id)->delete();
        return redirect()->route('branch.index')
            ->with('success','تم الحذف بنجاح');

    }
}
