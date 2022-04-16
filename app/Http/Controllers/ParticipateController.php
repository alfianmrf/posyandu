<?php

namespace App\Http\Controllers;

use App\Models\Participate;
use App\Http\Requests\StoreParticipateRequest;
use App\Http\Requests\UpdateParticipateRequest;

class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreParticipateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function show(Participate $participate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function edit(Participate $participate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParticipateRequest  $request
     * @param  \App\Models\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParticipateRequest $request, Participate $participate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participate  $participate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participate $participate)
    {
        //
    }
}
