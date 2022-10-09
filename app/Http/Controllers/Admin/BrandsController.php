<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands =Brand::get();
        return view('admin.brand.index',compact('brands'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'        =>'required',
            'name_en'        =>'required',
            'image'        =>'required|mimes:jpeg,jpg,png|max:1000',

        ],
            [
                'name_ar.required'  => ' من فضلك قم بادخال اسم المتجر.',
                'name_en.required'  => '  من فضلك قم بادخال اسم الصنف .',
                'image.required'  => 'من فضلك قم بادخال  الصورة.',
            ]);
        $brand = new Brand();
        $brand->name_ar = $request->name_ar;
        $brand->name_en = $request->name_en;
        if ($request->hasFile('image')) {
            $brand->image = $request->image->store('public/brand_image');
        }
        $brand->save();
        return redirect(route('brands.index'));
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
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
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
        $brand = Brand::find($id);
        $brand->name_ar = $request->name_ar;
        $brand->name_en = $request->name_en;
        if ($request->hasFile('image')) {
            $brand->image = $request->image->store('public/brand_image');
        }
        $brand->save();
        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return redirect()->route('brands.index')
            ->with('success','تم الحذف بنجاح');
    }

    public function updateOrder(Request $request)
    {


        for ($i = 0; $i < count($request->id); $i++) {
            Brand::find($request->id[$i])->update(['order' => $request->order[$i]]);
        }
        return 'success';
    }
}
