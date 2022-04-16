<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Balita;
use App\Models\Participate;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Growth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function dashboard()
    {
    }

    public function chart()
    {
        $balita = Balita::where('user_id', Auth::user()->id)->first();
        $growths = Growth::where('balita_id', $balita->id)->get()->take(12);

        $months = [];
        $weight = [];
        $height = [];
        $gizi_score = [];

        foreach ($growths as $growth) {
            $date = strtotime($growth->control_date);
            array_push($months,  date('M', $date));
            array_push($weight, (float) $growth->weight);
            array_push($height, (float) $growth->height);
            array_push($gizi_score, (float) $growth->gizi_score);
        }

        $data = [
            'months'     => $months,
            'height'     => $height,
            'weight'     => $weight,
            'gizi_score' => $gizi_score,
        ];

        return view('users.dashboard.baby_chart', $data);
    }

    public function agenda()
    {
        $balita = Balita::where('user_id', Auth::user()->id)->first();

        $participates = $balita->participates()->get();

        return view('users.dashboard.agenda', [
            'agendas'       => Agenda::OrderBy('agenda_date', 'DESC')->get(),
            'participates'  => $participates
        ]);
    }

    public function participate($id)
    {
        $balita = Balita::where('user_id', Auth::user()->id)->first();
        $data = [
            'balita_id' => $balita->id,
            'agenda_id' => $id
        ];

        Participate::create($data);

        return redirect(route('kegiatan'))->with('success', 'Anda berencana menghadiri kegiatan!');
    }
}
