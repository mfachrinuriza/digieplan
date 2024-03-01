<?php

namespace App\Models;

use CodeIgniter\Model;

class FilterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'filter';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'transaction_id', 'link_url'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';
}
