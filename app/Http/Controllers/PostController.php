<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Book;

class PostController extends Controller
{
    public function AllPost()
    {
        return view('perpus.AllPost', [
            'posts' => Post::where('jenis', 'postingan')
                ->Orwhere('jenis', 'balaspostingan')
                ->latest()->get(),
            'comments' => Comment::latest()->get()
        ]);
    }

    public function MyPost()
    {
        return view('perpus.MyPost', [
            'posts' => Post::where('user_id', auth()->user()->id)
                ->where(function ($query) {
                    $query->where('jenis', 'Postingan')
                        ->orWhere('jenis', 'BalasPostingan');
                })
                ->latest()->get(),
            'comments' => Comment::latest()->get()
        ]);
    }

    public function Notifikasi()
    {
        return view('perpus.Notifikasi', [
            'posts' => Post::where('jenis', 'notifikasi')->latest()->get()
        ]);
    }
    public function Comment(Request $request, $id)
    {
        $validatedData = $request->validate([
            'komen' => 'required|min:3|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['post_id'] = $id;

        Comment::create($validatedData);

        return redirect()->back()->with('berhasil', 'Data Berhasil Diubah');
    }
    public function CommentBuku(Request $request, $id)
    {
        // dd($request->comment);
        $validatedData = $request->validate([
            'komen' => 'required|min:3|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['book_id'] = $id;

        Comment::create($validatedData);

        return redirect()->back()->with('berhasil', 'Data Berhasil Diubah');
    }
    public function Delete($id)
    {
        Comment::find($id)->delete();

        return redirect()->back()->with('berhasil', 'Data Berhasil Dihapus!!');
    }

    public function BalasPostingan(Request $request, $id)
    {
        if ($request->lampiran == null) {
            $validatedData['lampiran'] = '-';
        } else {
            $file = $request->file('lampiran');
            $namaFile = $file->getClientOriginalName();

            $ekstensifoto = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
            $ekstensi = explode('.', $namaFile);
            $ekstensi = strtolower(end($ekstensi));
            if (!in_array($ekstensi, $ekstensifoto)) {
                return redirect()->back()->with('gagal', 'Ekstensi Tidak Diperbolehkan');
            }

            $validatedData['lampiran'] = $request->file(['lampiran'])->store('Data-File');
        }

        $validatedData['body'] = $request->balasan;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['jenis'] = 'balaspostingan';
        $validatedData['post_id'] = $id;

        Post::create($validatedData);


        return redirect()->back()->with('berhasil', 'Postingan Berhasil Ditambahkan!!');
    }
    public function Buku()
    {

        if (request('search') && request('jenis')) {
            return view('perpus.Buku', [
                'books' => Book::latest()->filter(request(['search', 'jenis']))->get()
            ]);
        }

        if (request('jenis') !== "semua") {
            return view('perpus.Buku', [
                'books' => Book::where('jenis', request('jenis'))
                    ->latest()->get()
            ]);
        }


        return view('perpus.Buku', [
            'books' => Book::latest()->get()
        ]);
    }
}
