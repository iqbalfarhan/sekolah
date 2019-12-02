<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan.list', ['jurusans' => $jurusans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'jurusan' => 'required',
            'inisial' => 'required',
            'kode' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages());
        }

        Jurusan::insert([
            'kode' => $request->input('kode'),
            'jurusan' => $request->input('jurusan'),
            'inisial' => $request->input('inisial'),
            'keterangan' => $request->input('keterangan') ?? "",
        ]);

        return redirect(route('jurusan.index'))->with('success', 'Jurusan Berhasil ditambahkan ke Database');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        //echo $jurusan;
        return view('jurusan.edit', ['jurusan' => $jurusan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validate = Validator::make($request->all(), [
            'jurusan' => 'required',
            'inisial' => 'required',
            'kode' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages());
        }

        Jurusan::where('id', $jurusan->id)->update([
            'kode' => $request->input('kode'),
            'jurusan' => $request->input('jurusan'),
            'inisial' => $request->input('inisial'),
            'keterangan' => $request->input('keterangan') ?? "",
        ]);

        return redirect(route('jurusan.index'))->with('success', 'Jurusan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::where('id', $jurusan->id)->delete();

        return redirect(route('jurusan.index'))->with('success', 'Jurusan Berhasil dihapus.. data tidak dapat di kembalikan');
    }
}
