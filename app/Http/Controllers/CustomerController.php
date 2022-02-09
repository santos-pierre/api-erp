<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validators;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::latest()->get();
        return response()->json(CustomerResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator($request->all(), [
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => ['required']
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth_date' => new Carbon($request->birth_date)
        ]);

        return response()->json(new CustomerResource($customer));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json(new CustomerResource($customer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = Validator($request->all(), [
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone_number' => ['required']
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $customer->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'birth_date' => new Carbon($request->birth_date)
                ]
        );

        return response()->json(new CustomerResource($customer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
