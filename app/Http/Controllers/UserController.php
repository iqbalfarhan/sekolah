<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '!=', 'register')->where('id', '!=', Auth::User()->id)->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages())->withInput();
        }

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $upload = $photo->store('public/img');
        }

        $query = User::insert([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'role' => $request->post('role'),
            'created_at' => now(),
            'photo' => $upload ?? 'default.png',
            'remember_token' => Str::random(10),
        ]);

        if ($query) {
            return redirect()->route('user.index')->with('success' ,'Akun baru berhasil di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'Image',
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages())->withInput();
        }

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $upload = $photo->store('public/img');
        }

        if ($request->post('password_reset')) {
            $password = Hash::make('password');
        }

        $query = User::where('id', $user->id)->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => $password ?? $user->password,
            'role' => $request->post('role'),
            'photo' => $upload ?? 'default.png',
        ]);

        if ($query) {
            return redirect()->route('user.index')->with('success' ,'Akun baru berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        Storage::delete($user->photo);
        return redirect()->route('user.index')->with('success' ,'Akun baru berhasil dihapus');
    }
}