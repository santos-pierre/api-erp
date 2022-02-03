<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Address::latest()->get();
        return response()->json(AddressResource::collection($data));
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
            'street_name' => 'required|max:255',
            'street_number' => 'required|max:10',
            'zip_code' => 'required|max:20',
            'city_name' => 'required|max:255',
            'country' => 'required|max:255',
            'customer_id' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $address = Address::create($validated->validated());

        return response()->json(new AddressResource($address));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return response()->json(new AddressResource($address));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validated = Validator($request->all(), [
            'street_name' => 'required|max:255',
            'street_number' => 'required|max:10',
            'zip_code' => 'required|max:20',
            'city_name' => 'required|max:255',
            'country' => 'required|max:255',
            'customer_id' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $address->update([
            'street_name' => $request->street_name,
            'street_number' => $request->street_number,
            'zip_code' => $request->zip_code,
            'city_name' => $request->city_name,
            'country' => $request->country,
            'customer_id' => $request->customer_id,
        ]);

        return response()->json(new AddressResource($address));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
