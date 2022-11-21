<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCustomerRequest;
use App\Http\Requests\StorePremiumRequest;
use App\Http\Requests\updateCustomerRequest;
use App\Http\Requests\updatePremiumRequest;
use App\Models\Customer;
use App\Models\Mobile;
use App\Models\mobile_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use MongoDB\Driver\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Laravolt\Avatar\Facade as Avatar;

class CustomersController extends Controller
{

    public function index()
    {
        $customer = Customer::query();
        if (request()->filled('q')) {
            $customer  = $customer->where(function ($q){
                $q->where('customer_name', 'like', '%' . request()->get('q') . '%');
            })->get();
        }
        else{
            $customer = $customer->UserCustomers()->get();
        }
        return view('admin.customers.index',compact('customer'))->with('i');
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(storeCustomerRequest $request)
    {

        auth()->user()->customers()->create($request->validated());
        return redirect()->route('customers.index')->withSuccessMessage(__('app.successfully_added'));
    }

    public function show(Customer $customer)
    {

        return view('admin.customers.show',compact('customer'))->with('i');
    }
    public function showPayments($id)
    {
        $customer = Customer::with('mobile')->find($id);

        return view('admin.payments.showPayments',compact('customer'))->with('i');
    }

    public function edit(Customer $customer )
    {
        return view('admin.customers.edit',compact('customer'));
    }

    public function update(updateCustomerRequest $customerRequest, updatePremiumRequest $premiumRequest, Customer $customer)
    {
        $validatedCustomer = $customerRequest->validated();
        $validatedCustomer['alternative_phone']=$customerRequest->alternative_phone;
        $validatedCustomer['identity']=$customerRequest->identity;

       $customer->update($validatedCustomer);
       $customer->mobile()->update($premiumRequest->validated());

        return redirect()->route('customers.show',$customer->id)->withSuccessMessage(__('app.successfully_edited'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->withSuccessMessage(__('app.successfully_deleted'));
    }

    public function printPayments($id){
        $mobilePayments = Mobile::find($id);
        return view('admin.customers.print', compact('mobilePayments'));

    }

}
