<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    protected $table = 'comic';  // nama table di database
    protected $primaryKey = 'id_comic';  // nama field id 
    protected $useTimestamps = true;  // jika menggunakan crated_at dan updated_at
    protected $allowedFields = [
        'name',
        'sampul',
        'penulis',
        'penerbit',
        'slug'
    ];    //  field / column yang boleh diisi oleh kita, sisanya field created_at & updated_at diisi secara otomatis oleh CInya 

    public function getComic($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
