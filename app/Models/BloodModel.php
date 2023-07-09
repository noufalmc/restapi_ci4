<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class BloodModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'blood';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','username','mobile','blood_group','status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function get_users()
    {
        $db = db_connect();
        $query=$db->query('SELECT blood.id,blood.username,blood.mobile,blood.blood_group,blood_group.name
        FROM blood
        INNER JOIN blood_group ON blood.blood_group=blood_group.id
        WHERE blood.status=1');
        return $query->getResult();
    }
}
