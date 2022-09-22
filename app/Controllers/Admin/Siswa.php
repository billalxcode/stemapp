<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    protected $session;
    protected $siswaModel;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->siswaModel = new \App\Models\SiswaModel();
    }
    
    public function index()
    {
        $this->set_breadchumb("Dashboard", base_url('admin'), false);
        $this->set_breadchumb("Siswa", base_url('admin/siswa'), true);
        return $this->renderOnce('admin/siswa/home');
    }

    public function create() {
        helper('form');

        $this->set_breadchumb("Dashboard", base_url('admin'), false);
        $this->set_breadchumb("Siswa", base_url('admin/siswa'), false);
        $this->set_breadchumb("Tambah Siswa", '', true);

        return $this->renderOnce('admin/siswa/create');
    }

    public function next() {
        helper('form');

        $this->set_breadchumb('Dashboard', base_url('admin'), false);
        $this->set_breadchumb("Siswa", base_url('admin/sswa'), false);
        $this->set_breadchumb('Next Step', '', true);

        if (empty($this->request->getPost())) {
            $this->session->setFlashdata('error', 'Terjadi kesalahan, mohon periksa data masukan.');
            return redirect()->to('admin/siswa/create')->withInput();
        } else {
            $this->set_context('post_data', $this->request->getPost());
        }
        
        return $this->renderOnce('admin/siswa/next');
    }
}
