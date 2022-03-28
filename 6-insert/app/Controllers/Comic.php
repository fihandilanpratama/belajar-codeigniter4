<?php

namespace App\Controllers;

use \App\Models\ComicsModel;

class Comic extends BaseController
{
    protected $comicsModel;

    public function __construct()
    {
        $this->comicsModel = new ComicsModel();   // instansisi kelas ComicsModel di folder model
    }

    public function index()
    {
        $data = [
            'title' => 'Comics List',
            'comics' => $this->comicsModel->getComic() // tanpa parameter mengembailkan semua data (find all) 
        ];

        // cara konek ke db tanpa model --->
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM comics");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row['judul']);
        // }

        // konek ke db dengan model --->
        // $comicsModel = new ComicsModel();  // instansisi kelas ComicsModel di folder model
        // $comics = $this->comicsModel->findAll();  // tampilkan semua
        // dd($comics);

        return view('comic/index', $data);
    }


    public function detail($slug)
    {
        $data = [
            'title' => 'detail comic',
            'comic' => $this->comicsModel->getComic($slug)
        ];

        // jika komik tidak ada di tabel
        if (empty($data['comic'])) {
            throw new \Codeigniter\Exceptions\PageNotFoundException('comic is not found');
        }
        return view('comic/detail', $data);
    }

    // method untuk untuk menampilkan halaman tambah data komik
    public function create()
    {
        $data = [
            'title' => 'form tambah data comic'
        ];

        return view('comic/create', $data);
    }

    // method yang menangani ketika data komik ditambah dari route /comic/create
    public function save()
    {
        // getVar() : untuk mengambil data yang dikirimkan dari form baik dengan method get ataupun post
        // getVar('name-dari-input-tagnya') : untuk ambil data form input satu satu

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->comicsModel->insert([
            'sampul' => $this->request->getVar('sampul'),
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
        ]);

        // lakukan flas data saat data comic ditambah dan sebelum redirect
        session()->setFlashdata('message', 'Succesfully inserted a new data!');

        return redirect()->to('/comic');
    }
}
