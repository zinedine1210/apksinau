<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Zinedine Ziddan Fahdlevy',
            'foto' => 'sinauprofil.png',
            'Sekolah' => 'SMKN 26 Jakarta',
            'bio' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias consequatur magni recusandae explicabo cumque rem maxime libero voluptates quaerat incidunt.",
            'alamat' => 'Kp gempol cakung timur jakarta timur',
            'tempat' => 'sumedang',
            'tanggallahir' => '2003-10-12',
            'instagram' => 'zine.zf',
            'facebook' => 'zinedine ziddan',
            'twitter' => 'zzf1210',
            'telegram' => 'zizifa',
            'website' => 'zinedinesite.epizy.com',
            'whatsapp' => 0,
            'username' => 'ziddan',
            'email' => 'ziddanfhdlvy12@gmail.com',
            'password' => bcrypt('admin'),
            'join' => date('d F Y')
        ]);
        User::create([
            'nama' => 'Lazzian Al Falah',
            'foto' => 'sinauprofil.png',
            'Sekolah' => 'SMKN 4 Jakarta',
            'bio' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias consequatur magni recusandae explicabo cumque rem maxime libero voluptates quaerat incidunt.",
            'alamat' => 'Comberan',
            'tempat' => 'Jakarte',
            'tanggallahir' => '2003-10-12',
            'instagram' => 'zine.zf',
            'facebook' => 'zinedine ziddan',
            'twitter' => 'zzf1210',
            'telegram' => 'zizifa',
            'website' => 'zinedinesite.epizy.com',
            'whatsapp' => 0,
            'username' => 'falah',
            'email' => 'lazzianalfalah@gmail.com',
            'password' => bcrypt('admin'),
            'join' => date('d F Y')
        ]);
        User::create([
            'nama' => 'Muhammad Alif Erlangga',
            'foto' => 'sinauprofil.png',
            'Sekolah' => 'SMKN 1172109739102 Jakarta',
            'bio' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias consequatur magni recusandae explicabo cumque rem maxime libero voluptates quaerat incidunt.",
            'alamat' => 'Empang',
            'tempat' => 'Cakung',
            'tanggallahir' => '2003-10-12',
            'instagram' => 'zine.zf',
            'facebook' => 'zinedine ziddan',
            'twitter' => 'zzf1210',
            'telegram' => 'zizifa',
            'website' => 'zinedinesite.epizy.com',
            'whatsapp' => 0,
            'username' => 'aliperlangga',
            'email' => 'aliperlangga@gmail.com',
            'password' => bcrypt('admin'),
            'join' => date('d F Y')
        ]);
        Post::create([
            'user_id' => 1,
            'post_id' => 0,
            'book_id' => 0,
            'jenis' => 'postingan',
            'lampiran' => '-',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, quae recusandae.'
        ]);
        Post::create([
            'user_id' => 2,
            'post_id' => 0,
            'book_id' => 0,
            'jenis' => 'postingan',
            'lampiran' => 'foto6.jpg',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae, quae recusandae.'
        ]);
        Post::create([
            'user_id' => 2,
            'post_id' => 1,
            'book_id' => 0,
            'jenis' => 'balaspostingan',
            'lampiran' => '-',
            'body' => 'Lorem ipsum dolor sit amet.'
        ]);
        Book::create([
            'judul' => 'Bumi',
            'penulis' => 'Tere liye',
            'penerbit' => 'Gramedia pustaka indah',
            'tahunterbit' => 2003,
            'jenis' => "pelajaran",
            'ISBN' => 81073107190,
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque qui deleniti debitis voluptatibus error nostrum eaque sed dignissimos sunt!',
            'mapel' => 'matematika',
            'buku' => 'Bulan.pdf',
            'cover' => 'negeri.jpg',
            'user_id' => 1
        ]);
        Book::create([
            'judul' => 'Pulang',
            'penulis' => 'Tere liye',
            'penerbit' => 'Gramedia pustaka indah',
            'tahunterbit' => 2004,
            'jenis' => "novel",
            'ISBN' => 81023423207190323,
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque qui deleniti debitis voluptatibus error nostrum eaque sed dignissimos sunt!',
            'mapel' => 'bahasa indonesia',
            'buku' => 'pulang.pdf',
            'cover' => 'foto3.jpg',
            'user_id' => 2
        ]);
    }
}
