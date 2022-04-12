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
        session();  // diperlukan untuk menerima validasi dari method save bagian cek validasi input
        $data = [
            'title' => 'form tambah data comic',
            'validation' => \Config\Services::validation()  // ambil validasi
        ];
        return view('comic/create', $data);
    }

    // method yang menangani ketika data komik ditambah dari route /comic/create
    public function save()
    {
        // validasi input
        if (!$this->validate([
            // no custom error (default by ci4)
            //  *name input     *rules dipisahin dengan | [namaTable.namaColumn] 
            // 'name'     =>     'required|is_unique[comic.name]'


            // with custom error with user specified
            'name' => [
                'rules' => 'required|is_unique[comic.name]',
                'errors' => [
                    // *type of error    *error message
                    'required'     =>   'nama komik harus diisi',
                    'is_unique'    =>   'nama komik sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            // redirect dan kirim semua validasi ke method create
            return redirect()->to('/comic/create')->withInput()->with('validation', $validation);
        }


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

    // method untuk hapus data
    public function delete($id)
    {
        $this->comicsModel->delete($id);
        session()->setFlashdata('message', 'Succesfully deleted!');
        return redirect()->to('/comic');
    }

    // method untuk untuk menampilkan halaman edit data komik
    public function edit($slug)
    {
        session();  // diperlukan untuk menerima validasi dari method save bagian cek validasi input
        $data = [
            'title' => 'form ubah data comic',
            'validation' => \Config\Services::validation(),  // ambil validasi
            'comic' => $this->comicsModel->getComic($slug)
        ];
        return view('comic/edit', $data);
    }

    // method untuk memproses ketika data diupdate
    public function update($id)
    {
        // validasi
        $oldComic = $this->comicsModel->getComic($this->request->getVar('slug'));
        if ($oldComic['name'] == $this->request->getVar('name')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[comic.name]';
        }

        if (!$this->validate([
            'name' => [
                'rules' => $rule_name,
                'errors' => [
                    'required'     =>   'nama komik harus diisi',
                    'is_unique'    =>   'nama komik sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comic/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->comicsModel->save([
            'id_comic' => $id,
            'sampul' => $this->request->getVar('sampul'),
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
        ]);

        // lakukan flas data saat data comic ditambah dan sebelum redirect
        session()->setFlashdata('message', 'Succesfully edited!');

        return redirect()->to('/comic');
    }
}
