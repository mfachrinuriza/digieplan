<?php

namespace App\Models;

use CodeIgniter\Model;

class GiftModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gift';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'transaction_id', 'user_id', 'type', 'bank_id', 'bank_name', 'account_number', 'receiver_name', 'receiver_address'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';
}
