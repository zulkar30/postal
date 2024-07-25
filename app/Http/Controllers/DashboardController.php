<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Lansia;
use App\Models\Layanan;
use App\Models\Permission;
use App\Models\Petugas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loggedInUser = Auth::user();
        $jumlahlayananPetugas = Layanan::where('petugas_id', $loggedInUser->petugas_id)->count();
        $jumlahlayananLansia = Layanan::where('lansia_id', $loggedInUser->lansia_id)->count();
        $users = User::count();
        $permissions = Permission::count();
        $roles = Role::count();
        $lansias = Lansia::count();
        $layanans = Layanan::count();
        $petugases = Petugas::count();
        $jadwals = Jadwal::count();
        return view('pages.dashboard', compact('users', 'permissions', 'roles', 'lansias', 'jumlahlayananPetugas', 'jumlahlayananLansia', 'petugases', 'layanans', 'jadwals'));
    }
}
