<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
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


    public function store(DeviceRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $validatedData['user_id'] = auth()->user()->id;
        Device::create($validatedData);

        return redirect()->route('devices.index')->withSuccessMessage(__('app.successfully_created'));
    }


    public function show(Device $device)
    {
        return view('admin.devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        return view('admin.devices.edit', compact('device'));
    }


    public function update(DeviceRequest $request, Device $device)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $validatedData['user_id'] = auth()->user()->id;

        $device->update($validatedData);
        return redirect()->route('devices.show', $device->id)->withSuccessMessage(__('app.successfully_updated'));
    }

    public function destroy(Device $device)
    {
        if (file_exists("storage/images/" . $device->image)) {
            if ($device->image) {
                unlink("storage/images/" . $device->image);
            }
        }

        $device->delete();
        return redirect()->back()->withSuccessMessage(__('app.successfully_deleted'));

    }

}
