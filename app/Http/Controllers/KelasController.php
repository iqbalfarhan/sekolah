<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Jurusan;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::orderBy('grade', 'asc')->get();
        return view('kelas.list', ['kelass' => $kelass]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $jurusans = Jurusan::all();
        return view('kelas.create', [
            'teachers' => $teachers,
            'jurusans' => $jurusans,
        ]);
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
            'grade' => 'required',
            'jurusan_id' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages()->all()[0])->withInput();
        }

        Kelas::insert([
            'grade' => $request->post('grade'),
            'jurusan_id' => $request->post('jurusan_id'),
            'walikelas' => $request->post('walikelas') ?? 0,
            'kelompok' => $request->post('kelompok') ?? "",
        ]);

        return redirect(route('kelas.index'))->with('success', "berhsil menambahkan kelas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kela)
    {
        //$data = Kelas::find($kela);
        $teachers = Teacher::all();
        $jurusans = Jurusan::all();
        return view('kelas.edit', [
            'kelas' => $kela,
            'jurusans' => $jurusans,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $validate = Validator::make($request->all(), [
            'grade' => 'required',
            'jurusan_id' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages()->all()[0])->withInput();
        }

        $id = $request->post('id');
        $query = Kelas::where('id', $id)->update([
            'grade' => $request->post('grade'),
            'jurusan_id' => $request->post('jurusan_id'),
            'walikelas' => $request->post('walikelas'),
            'kelompok' => $request->post('kelompok') ?? "",
        ]);
        if ($query == TRUE) {
            return redirect(route('kelas.index'))->with('success', 'berhasil ngerubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $query = Kelas::where('id', $kela->id)->delete();
        if ($query == TRUE) {
            return redirect(route('kelas.index'))->with('success', 'berhasil menghapus data');
        }
    }
}
