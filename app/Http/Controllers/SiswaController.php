<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Siswa;
use App\Models\Mapel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_siswa = Siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        return view('siswa.create',);
    }

    public function nilai(Request $request, $id)
    {
        // Mengambil data siswa
        $siswa = \App\Models\Siswa::find($id);

        // Memvalidasi inputan
        $request->validate([
            'mapel' => 'required',
            'nilai' => 'required|numeric',
        ]);

        // Menyimpan data nilai ke dalam database
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Data nilai berhasil disimpan.');
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = \App\Models\Siswa::find($idsiswa);
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('siswa/' .$idsiswa. '/profile')->with('success', 'Data nilai berhasil dimasukan .');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'required|mimes:jpeg,jpg,png'
        ]);
        // Simpan data ke tabel user
        $user = new \App\Models\User();
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(40);
        $user->save();

        // Simpan data ke tabel siswa
        $siswa = new Siswa;
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->user_id = $user->id; // Tetapkan nilai user_id
        $siswa->save();
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan');
    }



    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}
