<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Balita;
use App\Models\Growth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBalitaRequest;
use App\Http\Requests\UpdateBalitaRequest;
use PHPUnit\TextUI\XmlConfiguration\Group;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.data_balita', [
            'balitas'     => Balita::OrderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataBalita = Balita::where('user_id', Auth::user()->id)->first();
        if ($dataBalita) {
            $lastGrowth = $dataBalita->growths->last();
        } else {
            $dataBalita = null;
            $lastGrowth = null;
        }

        $data = [
            'balita'        => $dataBalita,
            'lastGrowth'    => $lastGrowth
        ];

        return view('users.dashboard.dashboard', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBalitaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBalitaRequest $request)
    {
        $validatedData = $request->validate([
            'no_kms'        => 'required|unique:balitas',
            'balita_name'   => 'required|max:255',
            'father_name'   => 'required|max:255',
            'mother_name'   => 'required|max:255',
            'city_born'     => 'required',
            'date_born'     => 'required',
            'age'           => 'required',
            'gender'        => 'required',
            'last_weight'   => 'required',
            'last_height'   => 'required',
            'gizi_status'   => 'required',
            'gizi_score'    => 'required',
            'user_id'       => 'required',
        ]);

        $validatedData['telp_numb'] = $request->telp_numb;
        $validatedData['address'] = $request->address;

        // dd($validatedData);
        $balita = Balita::create($validatedData);

        $growth = [
            'balita_id'     => $balita->id,
            'control_date'  => Carbon::now(),
            'age'           => $validatedData['age'],
            'weight'        => $validatedData['last_weight'],
            'height'        => $validatedData['last_height'],
            'gizi_status'   => $validatedData['gizi_status'],
            'gizi_score'    => $validatedData['gizi_score']
        ];

        Growth::create($growth);

        return redirect(route('home'))->with('success', 'Data Balita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function show(Balita $balita)
    {
    }

    public function detail($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $balita = Balita::find($id);

        if ($balita) {
            $lastGrowth = $balita->growths->last();
        }

        $gender = [
            'L' => 'Laki Laki',
            'P' => 'Perempuan'
        ];

        $data = [
            'balita'   => $balita,
            'growth'   => $lastGrowth,
            'gender'   => $gender
        ];

        return view('users.dashboard.edit_balita', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBalitaRequest  $request
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBalitaRequest $request, $id)
    {
        $validatedData = $request->validate([
            'no_kms'        => 'required',
            'balita_name'   => 'required|max:255',
            'father_name'   => 'required|max:255',
            'mother_name'   => 'required|max:255',
            'city_born'     => 'required',
            'date_born'     => 'required',
            'gender'        => 'required',
        ]);

        if ($request->telp_numb) {
            $validatedData['telp_numb'] = $request->telp_numb;
        }

        if ($request->address) {
            $validatedData['address'] = $request->address;
        }

        $growth = $request->validate([
            'age'           => 'required',
            'weight'        => 'required',
            'height'        => 'required',
            'gizi_status'   => 'required',
            'gizi_score'    => 'required',
        ]);

        // dd($request);

        Balita::where('id', $request->balita_id)
            ->update($validatedData);
        Growth::where('id', $request->growth_id)
            ->update($growth);

        if (Gate::allows('user'))
            return redirect(route('home'))->with('success', 'Data Balita berhasil diubah');
        else
            return redirect(route('balita.detail', $request->balita_id))->with('success', 'Data Balita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
