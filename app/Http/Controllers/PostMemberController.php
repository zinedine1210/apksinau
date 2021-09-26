<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perpus.timeline', [
            'posts' => Post::latest()->get(),
            'comments' => Comment::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required|max:1000|min:5'
        ]);

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

            $validatedData['lampiran'] = $request->file('lampiran')->store('Data-File');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['jenis'] = 'postingan';

        Post::create($validatedData);

        return redirect()->back()->with('berhasil', 'Postingan Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {

        $target = Post::where('post_id', $post)->get();

        Post::destroy($post);
        Post::destroy($target);

        return redirect()->back()->with('berhasil', 'Postingan Berhasil Dihapus!!');
    }
}
