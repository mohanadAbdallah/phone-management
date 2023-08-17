<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraderRequest;
use App\Http\Requests\UpdateTraderRequest;
use App\Models\Trader;
use function __;
use function auth;
use function redirect;
use function view;

class TraderController extends Controller
{

    public function index()
    {
        $traders = Trader::all();
        return view('admin.traders.index',compact('traders'));

    }

    public function create()
    {
        return view('admin.traders.create');
    }

    public function store(StoreTraderRequest $request)
    {
        auth()->user()->traders()->create($request->validated());
        return redirect()->route('traders.index');


    }

    public function show(Trader $trader)
    {
        return view('admin.traders.show',compact('trader'))->with('i');

    }

    public function edit(Trader $trader)
    {
        return view('admin.traders.edit',compact('trader'));
    }

    public function update(UpdateTraderRequest $request, Trader $trader)
    {
        $trader->update($request->validated());
        return redirect()->route('traders.show',$trader)->withSuccessMessage(__('app.successfully_edited'));
    }

    public function destroy(Trader $trader)
    {
        $trader->delete();
        return redirect()->route('traders.index')->withSuccessMessage(__('app.successfully_deleted'));
    }

}
