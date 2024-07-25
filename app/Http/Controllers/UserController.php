<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Models\Petugas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use File;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Middleware Gate
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::orderBy('id', 'asc')->get();
        $roles = Role::all()->pluck('name', 'id');
        $petugas = Petugas::orderBy('created_at', 'desc')->get();
        $lansia = Lansia::orderBy('created_at', 'desc')->get();
        // dd($petugas);
        return view('pages.user.index', compact('user', 'roles', 'petugas', 'lansia'));
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
        // get all request from frontsite
        $data = $request->all();

        // hash password
        $data['password'] = Hash::make($data['email']);

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-user';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // store to database
        $user = User::create($data);

        // sync role by users select
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Menambahkan User Baru');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user->load('role');

        return view('pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::all()->pluck('name', 'id');
        $user->load('role');

        return view('pages.user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // get all request from frontsite
        $data = $request->all();

        $data['password'] = Hash::make($data['email']);

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-user';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $user->update($data);

        // update roles
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Memperbarui Data User');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $user['foto'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        $user->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data User');
        return back();
    }
}
