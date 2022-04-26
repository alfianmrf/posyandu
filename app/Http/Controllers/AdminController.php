<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balita;
use App\Models\Growth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $balitaDataU12 = Balita::join('growths', function ($join) {
            $join->on('balita_id', '=', 'balitas.id')->whereIn('growths.id', function ($query) {
                $query->from('growths')->groupBy('balita_id')->selectRaw('max(id)');
            });
        })->where('age', '<=', '12')->get();

        $balitaDataU36 = Balita::join('growths', function ($join) {
            $join->on('balita_id', '=', 'balitas.id')->whereIn('growths.id', function ($query) {
                $query->from('growths')->groupBy('balita_id')->selectRaw('max(id)');
            });
        })->where('age', '>=', '13')->where('age', '<=', '36')->get();

        $balitaDataU60 = Balita::join('growths', function ($join) {
            $join->on('balita_id', '=', 'balitas.id')->whereIn('growths.id', function ($query) {
                $query->from('growths')->groupBy('balita_id')->selectRaw('max(id)');
            });
        })->where('age', '>=', '37')->where('age', '<=', '60')->get();

        $dataUmur = [
            count($balitaDataU12), count($balitaDataU36), count($balitaDataU60)
        ];

        $dataBalita = Balita::where('user_id', Auth::user()->id)->first();
        if ($dataBalita) {
            $lastGrowth = $dataBalita->growths->last();
        } else {
            $dataBalita = null;
            $lastGrowth = null;
        }

        $data = [
            'jumlahBalita'      => count(Balita::all()),
            'jumlahBalitaU12'   => $balitaDataU12 ? count($balitaDataU12) : 0,
            'jumlahBalitaU36'   => $balitaDataU36 ? count($balitaDataU36) : 0,
            'jumlahBalitaU60'   => $balitaDataU60 ? count($balitaDataU60) : 0,
            'dataUmur'          => $dataUmur,
            'balita'            => $dataBalita,
            'lastGrowth'        => $lastGrowth
        ];

        return view('dashboard', $data);
    }

    public function userIndex()
    {
        $users = User::orderBy('name', 'ASC')->get();

        $data = [
            'users' => $users
        ];

        return view('admin.users.data', $data);
    }

    public function userCreate()
    {
        $roles = ['user', 'admin'];
        $data = [
            'roles' => $roles
        ];

        return view('admin.users.create', $data);
    }

    public function userStore(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required',
            'role'          => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect(route('users.index'))->with('success', 'Data User berhasil ditambahkan');
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        $roles = ['admin', 'user'];
        $data = [
            'roles' => $roles,
            'user' => $user
        ];

        return view('admin.users.edit', $data);
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->email == $request->email) {
            $rules = 'required|email';
        } else {
            $rules = 'required|email|unique:users';
        }

        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => $rules,
            'role'          => 'required',
        ]);

        if ($request->password)
            $validatedData['password'] = Hash::make($request->password);

        User::where('id', $id)
            ->update($validatedData);

        return redirect(route('users.index'))->with('success', 'Data User berhasil diubah');
    }

    public function userDestroy($id)
    {
        User::destroy($id);

        return redirect(route('users.index'))->with('success', 'Data User berhasil dihapus');
    }

    public function balitaIndex()
    {
        $balitas = Balita::orderBy('no_kms', 'ASC')->get();

        $data = [
            'balitas' => $balitas
        ];

        return view('admin.balita.data', $data);
    }

    public function balitaCreate()
    {
        return view('users.dashboard.dashboard');
    }

    public function balitaDetail($id)
    {
        $dataBalita = Balita::find($id);
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

        return view('admin.balita.detail', $data);
    }

    public function balitaDestroy($id)
    {
        $growths = Growth::where('balita_id', $id)->get();

        foreach ($growths as $growth) {
            Growth::destroy($growth->id);
        }

        Balita::destroy($id);
        return redirect(route('balita.index'))->with('success', 'Data Balita berhasil dihapus!');
    }

    public function growthIndex($id)
    {
        $balita = Balita::where('id', $id)->first();

        $dataGrowths = $balita->growths;

        $data = [
            'balita_id'     => $balita->id,
            'dataGrowths'   => $dataGrowths
        ];

        return view('admin.growth.data', $data);
    }

    public function growthDestroy($id)
    {
        $thisGrowth = Growth::find($id);

        $growths = Growth::where('balita_id', $thisGrowth->balita_id)->get();

        if (count($growths) > 1) {
            Growth::destroy($id);
            return redirect(route('balita.growth', $thisGrowth->balita_id))->with('success', 'Data Perkembangan berhasil dihapus!');
        }

        return redirect(route('balita.growth', $thisGrowth->balita_id))->with('failed', 'Data Perkembangan harus ada minimal 1');
    }

    public function report()
    {
        $balitaData = Balita::join('growths', function ($join) {
            $join->on('balita_id', '=', 'balitas.id')->whereIn('growths.id', function ($query) {
                $query->from('growths')->groupBy('balita_id')->selectRaw('max(id)');
            });
        })->orderBy('no_kms', 'asc')->get();

        $data = [
            'balitas' => $balitaData
        ];

        return view('admin.laporan', $data);
    }
}
