<?php

namespace App\Http\Controllers;

use App\LookupStatus;
use Illuminate\Http\Request;

class LookupStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LookupStatus::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\LookupStatus  $lookupStatus
     * @return \Illuminate\Http\Response
     */
    public function show(LookupStatus $lookupStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LookupStatus  $lookupStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(LookupStatus $lookupStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LookupStatus  $lookupStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LookupStatus $lookupStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LookupStatus  $lookupStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(LookupStatus $lookupStatus)
    {
        //
    }
}
