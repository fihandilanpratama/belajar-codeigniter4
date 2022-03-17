<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    protected $table = 'comics';  // nama table di database
    protected $primaryKey = 'id_comic';  // nama field id 
    protected $useTimestamps = true;  // jika menggunakan crated_at dan updated_at
}
