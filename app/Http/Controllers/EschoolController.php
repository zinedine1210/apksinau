<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EschoolController extends Controller
{
    public function AsGuru()
    {
        return view('AsGuru');
    }
    public function AsSiswa()
    {
        return view('AsSiswa');
    }
    public function Eschool()
    {
        return view('Eschool');
    }
    public function GuruMasuk()
    {
        return view('login.GuruMasuk');
    }
    public function GuruDaftar()
    {
        return view('register.GuruDaftar');
    }
    public function SiswaMasuk()
    {
        return view('login.SiswaMasuk');
    }
    public function SiswaDaftar()
    {
        return view('register.SiswaDaftar');
    }
    public function index()
    {
        return view('sekolah.guru.beranda');
    }
}
