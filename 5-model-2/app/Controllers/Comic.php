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
        return view('comic/detail', $data);
    }
}
