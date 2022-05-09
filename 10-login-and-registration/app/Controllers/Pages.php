<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'home'
        ];
        return view('pages/home', $data);  // tampilkan file home.php di folder views/pages
    }

    public function about()
    {
        $data = [
            'title' => 'about'
        ];
        echo view('pages/about', $data);  // tampilkan file about.php di folder views/pages
    }

    public function contact()
    {
        $data = [
            'title' => 'contact',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. raya jerbus no. 5',
                    'kota' => 'ternate'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jl. patimura no. 3',
                    'kota' => 'morotai'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
