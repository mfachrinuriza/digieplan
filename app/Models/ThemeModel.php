<?php

namespace App\Models;

use CodeIgniter\Model;

class ThemeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'theme';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'id', 
                                    'package_code', 
                                    'theme_code', 
                                    'name', 
                                    'category', 
                                    'photo_1', 
                                    'photo_2', 
                                    'photo_3', 
                                    'photo_4', 
                                    'photo_5',
                                    'preview_url'
                                ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
