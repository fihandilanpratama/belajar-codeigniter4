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
        $comics = $this->comicsModel->findAll();  // tampilkan semua

        $data = [
            'title' => 'Comics List',
            'comics' => $comics
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
}
