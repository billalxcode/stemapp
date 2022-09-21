<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    protected $siswaModel;

    function __construct()
    {
        $this->siswaModel = new \App\Models\SiswaModel();

    }
    
    public function index()
    {
        $this->set_breadchumb("Dashboard", base_url('admin'), false);
        $this->set_breadchumb("Siswa", base_url('admin/siswa'), true);
        return $this->renderOnce('admin/siswa/home');
    }
}
