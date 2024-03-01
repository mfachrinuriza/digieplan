<?php

namespace App\Models;

use CodeIgniter\Model;

class PrayModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prays';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'religion', 'surah_name', 'surah_content', 'sub_content', 'created_date', 'updated_date', 'deleted_date'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';
}
