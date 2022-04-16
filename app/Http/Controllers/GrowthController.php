<?php

namespace App\Http\Controllers;

use App\Models\Growth;
use App\Http\Requests\StoreGrowthRequest;
use App\Http\Requests\UpdateGrowthRequest;
use App\Models\Balita;

class GrowthController extends Controller
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
    public function create($id)
    {
        $data = [
            'balita_id' => $id,
        ];

        return view('admin.growth.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGrowthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrowthRequest $request)
    {
        $validatedData = $request->validate([
            'control_date'  => 'required',
            'age'           => 'required',
            'weight'        => 'required',
            'height'        => 'required',
            'gizi_status'   => 'required',
            'gizi_score'    => 'required',
            'balita_id'     => 'required',
        ]);

        $balita = Balita::find($request->balita_id);

        // dd($balita);

        Growth::create($validatedData);

        return redirect(route('balita.growth', $balita->id))->with('success', 'Data Balita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Growth  $growth
     * @return \Illuminate\Http\Response
     */
    public function show(Growth $growth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Growth  $growth
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $growth = Growth::find($id);

        $data = [
            'growth'   => $growth,
        ];

        return view('admin.growth.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGrowthRequest  $request
     * @param  \App\Models\Growth  $growth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrowthRequest $request, $id)
    {
        $validatedData = $request->validate([
            'control_date'  => 'required',
            'age'           => 'required',
            'weight'        => 'required',
            'height'        => 'required',
            'gizi_status'   => 'required',
            'gizi_score'    => 'required',
        ]);

        $thisGrowth = Growth::find($id);

        Growth::where('id', $id)
            ->update($validatedData);

        return redirect(route('balita.growth', $thisGrowth->balita_id))->with('success', 'Data Growth berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Growth  $growth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Growth $growth)
    {
        //
    }
}
