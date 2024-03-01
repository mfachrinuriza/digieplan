<?php

namespace App\Models;

use CodeIgniter\Model;

class BanksModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'banks';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name', 'logo_light', 'logo_dark', 'is_bank'];
}
