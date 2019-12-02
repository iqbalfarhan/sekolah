<?php

namespace App\Http\Controllers;

use App\Teacher;

use App\Exports\TeachersExport;
use App\imports\TeachersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(20);
        return view('teacher.list', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
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
            'nama' => 'required',
            'pendidikan_terakhir' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->with('error', $validate->messages())->withInput();
        }


        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $upload = $photo->store('public/img');
        }

        Teacher::insert([
            'nign' => $request->input('nign'),
            'nama' => $request->input('nama'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'status' => $request->input('status'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'agama' => $request->input('agama'),
            'photo' => $upload ?? "default.png",
        ]);
        return redirect(route('teacher.index'))->with('success', 'berhasil input guru baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.detail', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        Teacher::where('id',$teacher->id)->update([
            'nign' => $request->input('nign'),
            'nama' => $request->input('nama'),
            'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
            'jk' => $request->input('jk'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'status' => $request->input('status'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),
            'agama' => $request->input('agama'),
        ]);
        return redirect(route('teacher.index'))->with('success', 'Berhasil update Data guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::find($teacher->id)->delete();
        return redirect(route('teacher.index'))->with('success', 'Berhasil Hapus Data guru');
    }

    public function photo_upload(Request $request, Teacher $teacher)
    {
        $photo = $request->file('photo');
        $upload = $photo->store('public/img');

        if ($upload) {
            Storage::delete(Teacher::where('id', $teacher->id)->first()->photo);
            Teacher::where('id', $teacher->id)->update([
                'photo' => $upload
            ]);
            return back()->with('info', 'Berhasil Upload Photo');
        }
    }

    public function deleted(Teacher $teacher)
    {
        $teachers = Teacher::onlyTrashed()->get();
        return view('teacher.deleted', [
            'teachers' => $teachers
        ]);
    }

    public function restore($teacher)
    {
        Teacher::withTrashed()->where('id', $teacher)->restore();
        return back()->with('success', 'Guru berhasil di restore');
    }

    public function forcedelete($teacher)
    {
        $data = Teacher::withTrashed()->find($teacher);
        Storage::delete($data->photo);
        Teacher::withTrashed()->where('id', $teacher)->forceDelete();
        return back()->with('success', 'Guru berhasil di hapus permanen');
    }

    public function import()
    {
        return view('teacher.import');
    }

    public function import_store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        Excel::import(new TeachersImport, $request->file('file'));

        return redirect(route('teacher.index'))->with('success', 'Berhasil mengimpor data guru');
    }

    public function export()
    {
        return Excel::download(new TeachersExport, 'guru_'.time().'.xlsx');
    }
}
