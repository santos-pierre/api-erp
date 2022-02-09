<?php

namespace App\Http\Controllers;

use App\Models\CommandStatus;
use Illuminate\Http\Request;

class CommandStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CommandStatus::latest()->get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommandStatus  $commandStatus
     * @return \Illuminate\Http\Response
     */
    public function show(CommandStatus $commandStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommandStatus  $commandStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommandStatus $commandStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommandStatus  $commandStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommandStatus $commandStatus)
    {
        //
    }
}
