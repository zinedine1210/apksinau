<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

class MemberController extends Controller
{
    public function index()
    {
        return view('perpus.Member', [
            'books' => Book::latest()->get(),
            'users' => User::latest()->get(),
            'posts' => Post::latest()->get(),
            'comments' => Comment::latest()->get()
        ]);
    }
}
