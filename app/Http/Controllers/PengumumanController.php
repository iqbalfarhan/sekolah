<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pengumuman::all();
        return view('pengumuman.list', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = "";
        if ($request->get('ppdb') == 'true') {
            $data = ['jenis' => 'Pengumuman PPDB'];
        }
        return view('pengumuman.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'Max:1024'
        ]);

        $file = $request->file('file');
        if (!empty($file) || isset($file)) {
            $upload = $file->store('public/pengumuman');

            if ($upload) {
                Pengumuman::insert([
                    'jenis' => $request->post('jenis'),
                    'judul' => $request->post('judul'),
                    'tulisan' => $request->post('tulisan'),
                    'created_at' => now(),
                    'file' => $upload,
                ]);
            }
        }
        else{
            Pengumuman::insert([
                'jenis' => $request->post('jenis'),
                'judul' => $request->post('judul'),
                'tulisan' => $request->post('tulisan'),
                'created_at' => now(),
                'file' => ""
            ]);
        }
        return redirect(route('pengumuman.index'))->with('success', 'Pengumuman baru berhasil diposting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.show', ['data' => $pengumuman]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', ['pengumuman' => $pengumuman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'file' => 'Max:3072'
        ]);

        $file = $request->file('file');
        if (!empty($file) || isset($file)) {
            $upload = $file->store('public/pengumuman');

            if ($upload) {
                Storage::delete($pengumuman->file);
                Pengumuman::where('id', $pengumuman->id)->update([
                    'judul' => $request->post('judul'),
                    'tulisan' => $request->post('tulisan'),
                    'file' => $upload,
                ]);
            }
        }
        else{
            Pengumuman::where('id', $pengumuman->id)->update([
                'judul' => $request->post('judul'),
                'tulisan' => $request->post('tulisan'),
            ]);
        }
        return redirect(route('pengumuman.index'))->with('success', 'Pengumuman baru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        Storage::delete($pengumuman->file);
        Pengumuman::where('id', $pengumuman->id)->delete();
        return redirect(route('pengumuman.index'))->with('success', 'Pengumuman baru berhasil dihapus');
    }
}
