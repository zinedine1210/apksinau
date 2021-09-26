<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Post;
use App\Models\Comment;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search') && request('jenis')) {
            return view('perpus.BukuSaya', [
                'books' => Book::where("user_id", auth()->user()->id)
                    ->latest()
                    ->filter(request(['search', 'jenis']))
                    ->get()
            ]);
        }
        if (request('jenis') !== "semua") {
            return view('perpus.BukuSaya', [
                'books' => Book::where('jenis', request('jenis'))
                    ->where('user_id', auth()->user()->id)
                    ->latest()->get()
            ]);
        }

        return view('perpus.BukuSaya', [
            'books' => Book::where('user_id', auth()->user()->id)->get()
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
        if ($request->buku == null) {
            return redirect()->back()->with('gagal', 'Kamu Belum Upload Buku!!');
        } elseif ($request->cover == null) {
            return redirect()->back()->with('gagal', 'Kamu Belum Upload Cover!!');
        }

        $filebuku = $request->file('buku');
        $namaBuku = $filebuku->getClientOriginalName();
        $ekstensibuku = ['pdf'];
        $ekstensi = explode('.', $namaBuku);
        $ekstensi = strtolower(end($ekstensi));

        if (!in_array($ekstensi, $ekstensibuku)) {
            return redirect()->back()->with('gagal', 'Ekstensi Buku Tidak Diperbolehkan');
        }

        $filecover = $request->file('cover');
        $namaCover = $filecover->getClientOriginalName();
        $ekstensibuku = ['jpg', 'jpeg', 'png'];
        $ekstensi = explode('.', $namaCover);
        $ekstensi = strtolower(end($ekstensi));

        if (!in_array($ekstensi, $ekstensibuku)) {
            return redirect()->back()->with('gagal', 'Ekstensi Cover Tidak Diperbolehkan');
        }

        $ukuran = $request->file('buku')->getSize() / 1024;

        $idbuku = Book::create([
            'judul' => ucwords($request->judul),
            'penulis' => ucwords($request->penulis),
            'penerbit' => ucwords($request->penerbit),
            'tahunterbit' => $request->tahunTerbit,
            'jenis' => $request->jenis,
            'ukuran' => $ukuran,
            'ISBN' => $request->ISBN,
            'deskripsi' => ucfirst($request->deskripsi),
            'mapel' => $request->mapel,
            'buku' => $request->file('buku')->store('Data-Buku'),
            'cover' => $request->file('cover')->store('Data-Buku'),
            'user_id' => auth()->user()->id
        ]);

        $id = $idbuku->id;

        Post::create([
            'user_id' => auth()->user()->id,
            'book_id' => $id,
            'jenis' => 'notifikasi',
            'lampiran' => $request->file('cover')->store('Data-Buku'),
            'body' => ucwords($request->judul)
        ]);

        return redirect()->back()->with('berhasil', 'Buku Berhasil Diunggah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('perpus.CardBuku', [
            'books' => Book::where('id', $id)->get(),
            'comments' => Comment::where('book_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->buku !== null or $request->cover !== null) {
            $filebuku = $request->file('buku');
            $namaBuku = $filebuku->getClientOriginalName();
            $ekstensibuku = ['pdf'];
            $ekstensi = explode('.', $namaBuku);
            $ekstensi = strtolower(end($ekstensi));

            if (!in_array($ekstensi, $ekstensibuku)) {
                return redirect()->back()->with('gagal', 'Ekstensi Buku Tidak Diperbolehkan');
            }

            $filecover = $request->file('cover');
            $namaCover = $filecover->getClientOriginalName();
            $ekstensibuku = ['jpg', 'jpeg', 'png'];
            $ekstensi = explode('.', $namaCover);
            $ekstensi = strtolower(end($ekstensi));

            if (!in_array($ekstensi, $ekstensibuku)) {
                return redirect()->back()->with('gagal', 'Ekstensi Cover Tidak Diperbolehkan');
            }

            Book::where('id', $id)
                ->update([
                    'judul' => ucwords($request->judul),
                    'penulis' => ucwords($request->penulis),
                    'penerbit' => ucwords($request->penerbit),
                    'tahunterbit' => $request->tahunTerbit,
                    'jenis' => $request->jenis,
                    'ukuran' => $request->file('buku')->getSize(),
                    'ISBN' => $request->ISBN,
                    'deskripsi' => ucfirst($request->deskripsi),
                    'mapel' => $request->mapel,
                    'buku' => $request->file('buku')->store('Data-Buku'),
                    'cover' => $request->file('cover')->store('Data-Buku'),
                    'user_id' => auth()->user()->id
                ]);

            return redirect()->back()->with('berhasil', 'Buku Berhasil Diupdate!!');
        }

        $target = Book::find($id);

        Book::where('id', $id)
            ->update([
                'judul' => ucwords($request->judul),
                'penulis' => ucwords($request->penulis),
                'penerbit' => ucwords($request->penerbit),
                'tahunterbit' => $request->tahunTerbit,
                'jenis' => $request->jenis,
                'ukuran' => $target['ukuran'],
                'ISBN' => $request->ISBN,
                'deskripsi' => ucfirst($request->deskripsi),
                'mapel' => $request->mapel,
                'buku' => $target['buku'],
                'cover' => $target['cover'],
                'user_id' => auth()->user()->id
            ]);

        return redirect()->back()->with('berhasil', 'Buku Berhasil Diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()->back()->with('berhasil', 'Buku Berhasil Dihapus!!');
    }
}
