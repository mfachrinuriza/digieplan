<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceptionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reception';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'id', 
                                    'transaction_id', 
                                    'user_id', 
                                    'title', 
                                    'date', 
                                    'start_time', 
                                    'end_time', 
                                    'time_zone', 
                                    'place_name', 
                                    'address', 
                                    'link_address', 
                                    'isPrimary',
                                    'isUntilEnd'
                                ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
