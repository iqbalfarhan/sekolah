<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function account_setting()
    {
        $auth = User::where('id', Auth::User()->id)->first();
        return view('saya',['auth' => $auth]);
    }

    public function dokumentasi()
    {
        return view('dokumentasi');
    }

    public function akun()
    {
        echo User::all();
    }

    public function ppdb()
    {
        $data = Ppdb_setting::first();
        return view('ppdb.index', ['data' => $data]);
    }

    public function photo_upload(Request $request)
    {
        $photo = $request->file('photo');
        $upload = $photo->store('public/img');

        if ($upload) {
            $datauser = User::where('email', Auth::User()->email);
            Storage::delete($datauser->first()->photo);
            $datauser->update([
                'photo' => $upload
            ]);
            return back()->with('success' ,'Berhasil Upload Photo');
        }


    }

    public function login_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required'
        ]);

        $name = $request->post('name');
        $old_password = $request->post('old_password');
        $password_baru = $request->post('password_baru');

        if (Hash::check($old_password, Auth::User()->password) == true) {
            if ($password_baru != "") {
                $new_password = Hash::make($password_baru);
            }
            else{
                $new_password = Auth::User()->password;
            }
            User::where('id', Auth::User()->id)->update([
                'name' => $name,
                'email' => $request->post('email'),
                'password' => $new_password,
            ]);
            return back()->with('success', 'perubahan data login berhasil');
        }
        else{
            return back()->with('error', 'password lama salah');
        }

    }

    public function sekolah_edit(Sekolah $sekolah)
    {
        $data = Sekolah::first();
        return view('sekolah', ['data' => $data]);
    }

    public function sekolah_update(Request $request)
    {
        //echo $sekolah;
        $validator = Validator::make($request->all(), [
            'nama_sekolah' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }

        if (Sekolah::count() == 0 || $request->post('id') == 0) {
            Sekolah::insert([
                'nama_sekolah' => $request->post('nama_sekolah'),
                'npsm' => $request->post('npsm') ?? "",
                'alamat' => $request->post('alamat'),
                'website' => $request->post('website'),
                'email' => $request->post('email'),
                'telepon' => $request->post('telepon'),
                'created_at' => now()
            ]);
        }
        else{
            Sekolah::where('id', $request->post('id'))->update([
                'nama_sekolah' => $request->post('nama_sekolah'),
                'npsm' => $request->post('npsm'),
                'alamat' => $request->post('alamat'),
                'website' => $request->post('website'),
                'email' => $request->post('email'),
                'telepon' => $request->post('telepon'),
            ]);
        }

        return back()->with('success', 'Profil sekolah berhasil di perbarui ');
    }

    public function sekolah_upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'Image|required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }

        $file = $request->file('logo');
        $upload = $file->store('public');

        if ($upload) {
            if (Sekolah::count() != 0) {
                $sekolah = Sekolah::first();
                
                Storage::delete($sekolah->logo);
                Sekolah::where('id', $sekolah->id)->update([
                    'logo' => $upload
                ]);
                return back()->with('success' ,'Berhasil Upload logo');
            }
            else{
                return back()->with('error' ,'Harap mengisi data sekolah terlebih dulu');
            }
        }
    }

}
