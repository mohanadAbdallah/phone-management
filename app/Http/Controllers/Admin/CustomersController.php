<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCustomerRequest;
use App\Models\Customer;
use App\Models\Mobile;
use App\Models\mobile_payment;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $customer = Customer::UserCustomers()->get();
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

    public function show($id)
    {
        $customer = Customer::find($id);

        return view('admin.customers.show',compact('customer'))->with('i');
    }
    public function showPayments($id)
    {
        $customer = Customer::with('mobile')->find($id);

        return view('admin.payments.showPayments',compact('customer'))->with('i');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit',compact('customer'));
    }

    public function update(Request $request, $id)
    {

        $customer = Customer::findOrfail($id);
        $customer->update($request->all());

    return redirect()->route('mobiles.index')->with('success','تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.index')
            ->with('success','تم الحذف بنجاح');
    }
    public function export()
    {
        $all_customers = [];
        $customers = Customer::select('name', 'email','mobile', 'status','created_at')->get();

        foreach ($customers as $item) {
            $all_customers[] = [
                'name' => $item->name ??'N/A',
                'email' => $item->email ??'N/A',
                'mobile' => $item->mobile ??'N/A',
                'status' => $item->status_name  ??'N/A',
                'created_at' => $item->created_at  ??'N/A',
            ];
        }

        return Excel::download(new CustomerExport($all_customers), 'Customers.xlsx');

    }
    public function printPayments($id){
        $mobilePayments = Mobile::find($id);
        return view('admin.customers.print', compact('mobilePayments'));

    }

}
