<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.MemberDaftar');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:255|min:5|unique:users',
            'nama' => 'required|max:255|min:5',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:255|min:5',
            'password2' => 'required|max:255|min:5'
        ]);

        if ($data['password'] === $data['password2']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            return redirect('/MemberDaftar')->with('gagal', 'Password Tidak Sesuai!!');
        }

        $data['nama'] = ucwords($data['nama']);
        $data['email'] = strtolower($data['email']);
        $data['foto'] = 'Foto-Profil/sinauprofil.png';
        $data['join'] = date('d F Y');


        User::create($data);

        return redirect('/MemberMasuk')->with('berhasil', 'Akun Berhasil Didaftarkan!! Silahkan Login');
    }

    public function EditProfil(Request $request, $id)
    {
        $dataLama = User::find($id);
        if ($request->foto == null) {
            $validatedData['foto'] = $dataLama->foto;
        } else {
            $validatedData = $request->validate([
                'foto' => 'image|file|max:2048'
            ]);
            $validatedData['foto'] = $request->file('foto')->store('Foto-Profil');
        }

        $validatedData['bio'] = $request->bio;
        $validatedData['nama'] = $request->nama;
        $validatedData['alamat'] = $request->alamat;
        $validatedData['sekolah'] = $request->sekolah;
        $validatedData['tempat'] = $request->tempat;
        $validatedData['tanggallahir'] = $request->tanggallahir;
        $validatedData['instagram'] = $request->instagram;
        $validatedData['facebook'] = $request->facebook;
        $validatedData['twitter'] = $request->twitter;
        $validatedData['telegram'] = $request->telegram;
        $validatedData['website'] = $request->website;
        $validatedData['whatsapp'] = $request->whatsapp;
        $validatedData['join'] = $request->join;

        User::where('id', $id)->update($validatedData);

        return redirect()->back()->with('berhasil', 'Profil Berhasil Diubah!!');
    }
}
