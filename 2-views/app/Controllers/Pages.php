<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'home'
        ];
        echo view('layouts/header', $data);
        echo view('pages/home');  // tampilkan file home.php di folder views/pages
        echo view('layouts/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'about'
        ];
        echo view('layouts/header', $data);  // kirimkan data pada view header
        echo view('pages/about');  // tampilkan file about.php di folder views/pages
        echo view('layouts/footer');
    }
}
