<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Models\Balita;
use App\Models\Participate;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agenda.data', [
            'agendas'     => Agenda::OrderBy('agenda_date', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgendaRequest $request)
    {
        $validatedData = $request->validate([
            'agenda_name' => 'required',
            'agenda_date' => 'required',
            'description' => 'required',
        ]);

        // dd($validatedData);
        Agenda::create($validatedData);

        return redirect(route('agenda'))->with('success', 'Data Agenda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = Agenda::find($id);

        $data = [
            'agenda'   => $agenda,
        ];

        return view('admin.agenda.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgendaRequest  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgendaRequest $request, $id)
    {
        $validatedData = $request->validate([
            'agenda_name'   => 'required',
            'agenda_date'   => 'required',
            'description'   => 'required',
        ]);

        Agenda::where('id', $id)
            ->update($validatedData);

        return redirect(route('agenda'))->with('success', 'Data Agenda berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participates = Participate::where('agenda_id', $id)->get();

        foreach ($participates as $participate) {
            Participate::destroy($participate->id);
        }

        Agenda::destroy($id);
        return redirect(route('agenda'))->with('success', 'Data Agenda berhasil dihapus!');
    }
}
