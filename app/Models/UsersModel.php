<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email', 'username', 'password', 'refresh_token',
        'role', 'status'
    ];

    // Dates
    protected $useTimestamps = true;
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

    function generate_token() {
        $alphabets = 'abdefghijklmnopqrstuvwyxz1234567890!@#$%^&*';
        $results = 'TOKEN:';
        for ($i = 0; $i<random_int(50, 200); $i++) {
            $randx = random_int(0, strlen($alphabets) - 1);
            $res = $alphabets[$randx];

            if (random_int(0, 1) == 1) {
                $results .= strtoupper($res);
            } else {
                $results .= strtolower($res);
            }
        }

        return $results;
    }
    
    public function getuser_by_email($email, bool $active = true) {
        $selector = $this->select('id,email,username,password,refresh_token,role,status');
        if ($active) {
            $data = $selector->where(['email' => $email, 'status' => 'active'])->first();
            return $data;
        } else {
            $data = $selector->where('email', $email)->first();
            return $data;
        }
    }

    public function set_refreshtoken($user_id, bool $null = false) {
        if ($null != true) {
            $token = $this->generate_token();
        } else {
            $token = null;
        }

        $this->update($user_id, [
            'refresh_token' => $token
        ]);
        return $token;
    }

    public function getuser_by_token($token) {
        $data = $this->select('id,email,username,refresh_token')->where('refresh_token', $token)->first();
        return $data;
    }
}
