<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy('id', 'asc')->paginate(6);
        return view('admin.devices.index', compact('devices'))->with('i');
    }

    public function create()
    {
        return view('admin.devices.create');
    }


    public function store(Request $request)
    {
        $device = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'type' => 'required',
            'price' => ['required','numeric'],
            'storage' => ['required','numeric'],
            'ram' => ['required','numeric']
        ]);

        if ($request->hasFile('image') && $request->image != null){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            $device['image'] = $imageName;
        }

        $device['description'] = $request->description ?? null;
        $device['user_id'] = auth()->user()->id;

        Device::create($device);

        return redirect()->route('devices.index')->withSuccessMessage(__('app.successfully_created'));
    }


    public function show(Device $device)
    {
        return view('admin.devices.show',compact('device'));
    }

    public function edit(Device $device)
    {
        return view('admin.devices.edit',compact('device'));
    }


    public function update(Request $request, Device $device)
    {
        $editedDevice = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'type' => 'required',
            'price' => ['required','numeric'],
            'storage' => ['required','numeric'],
            'ram' => ['required','numeric']
        ]);

        if ($request->hasFile('image') && $request->image != null){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            $editedDevice['image'] = $imageName;
        }
        $editedDevice['description'] = $request->description ?? null;
        $editedDevice['user_id'] = auth()->user()->id;

        $device->update($editedDevice);
        return redirect()->route('devices.show',$device->id)->withSuccessMessage(__('app.successfully_updated'));
    }

    public function destroy(Device $device)
    {
        if(file_exists("storage/images/".$device->image)){
            unlink("storage/images/".$device->image);
        }

        $device->delete();
        return redirect()->back()->withSuccessMessage(__('app.successfully_deleted'));

    }

}
