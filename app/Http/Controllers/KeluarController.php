<?php

namespace App\Http\Controllers;

use App\Student;
use App\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('status', '!=', 'aktif')->get();
        return view('keluar.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where('status', 'aktif')->orderBy('name', 'asc')->get();
        return view('keluar.create', ['students' => $students]);
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
            'siswa_id' => 'required',
            'alasan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'isi semua data yang diperlukan');
        }

        Keluar::create([
            'siswa_id' => $request->post('siswa_id'),
            'alasan' => $request->post('alasan'),
            'tanggal' => $request->post('tanggal'),
            'keterangan' => $request->post('keterangan')
        ]);

        Student::find($request->siswa_id)->update([
            'status' => $request->post('alasan')
        ]);

        return redirect(route('keluar.index'))->with('success', 'Berhasil melakukan pendaftaran keluar');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function show($siswa_id)
    {
        $data = Student::where('id', $siswa_id)->first();
        return view('keluar.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluar $keluar)
    {
        return view('keluar.edit', ['data' => $keluar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluar $keluar)
    {
        $validate = Validator::make($request->all(), [
            'alasan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'isi semua data yang diperlukan');
        }

        Keluar::where('id', $keluar->id)->update([
            'alasan' => $request->post('alasan'),
            'tanggal' => $request->post('tanggal'),
            'keterangan' => $request->post('keterangan')
        ]);

        Student::find($keluar->siswa_id)->update([
            'status' => $request->post('alasan')
        ]);

        return redirect(route('keluar.index'))->with('success', 'Berhasil melakukan perubahan data pendaftaran keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluar $keluar)
    {
        //
    }
}