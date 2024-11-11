<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function CustomerPage()
    {
        return view('pages.dashboard.customer-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CustomerList(Request $request)
    {
        $user_id = $request->header('id');
        return Customer::where('user_id', '=', $user_id)->get();
    }

    function CustomerCreate(Request $request)
    {
        $user_id = $request->header('id');
        return Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'user_id' => $user_id
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function CustomerDelete(Request $request)
    {
        $customer_id = $request->input('id');
        $user_id = $request->header('id');

        return Customer::where('id', '=', $customer_id)
            ->where('user_id', '=', $user_id)->delete();
    }

    /**
     * Display the specified resource.
     */
    function CustomerByID(Request $request)
    {
        $customer_id = $request->input('id');
        $user_id = $request->header('id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->first();
    }


    /**
     * Show the form for editing the specified resource.
     */
    function CustomerUpdate(Request $request)
    {
        $customer_id = $request->input('id');
        $user_id = $request->header('id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
