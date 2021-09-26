<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Post;
use App\Models\User;

class DirectController extends Controller
{
    public function index()
    {
        return view('Portal');
    }
    public function PusatInformasi()
    {
        $dataMember = User::all()->count();
        $dataBuku = Book::all()->count();

        return view('PusatInformasi', [
            'books' => $dataBuku,
            'users' => $dataMember
        ]);
    }
}
