<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo 'ini adalah controler Coba method index';
    }
    public function about($nama = '', $umur = 0)
    {
        echo "ini adalah controler Coba method about | nama $nama, umur $umur tahun";
    }
}
