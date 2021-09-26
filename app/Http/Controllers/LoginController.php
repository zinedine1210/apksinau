<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Book;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.MemberMasuk');
    }
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/Perpus')->with('login', 'Selamat Datang!! ' . auth()->user()->nama);
        }

        return back()->with('gagal', 'Login Gagal, Silahkan Periksa Kembali!!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/MemberMasuk');
    }
    public function perpus()
    {
        $dataMember = User::all()->count();
        $dataPostingan = Post::all()->count();
        $dataBuku = Book::all()->count();
        $total = $dataMember + $dataPostingan + $dataBuku;
        $persenMember = $dataMember / $total * 100;
        $persenPostingan = $dataPostingan / $total * 100;
        $persenBuku = $dataBuku / $total * 100;

        $bukuPelajaran = Book::where('jenis', 'pelajaran')->count();
        $bukuNovel = Book::where('jenis', 'novel')->count();
        $total = $bukuPelajaran + $bukuNovel;

        $persenPelajaran = 1;
        $persenNovel = 1;

        return view('perpus.beranda', [
            'books' => $dataBuku,
            'posts' => $dataPostingan,
            'users' => $dataMember,
            'Pbooks' => $persenBuku,
            'Pposts' => $persenPostingan,
            'Pusers' => $persenMember,
            'Ppelajaran' => $persenPelajaran,
            'Pnovel' => $persenNovel
        ]);
    }
}
