<?php

class Dashboard extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mhasil');
        $this->load->model('Mglobal');
        // if ($this->session->userdata('status') != "login_admin") {
        //     redirect(base_url("login"));
        // }
    }

    // view dashboard
    public function index()
    {
        $data['hal'] = 'Dashboard';
        $where = array(
            'tahun' => date('Y')
        );
        $data['laporan']     = $this->Mhasil->getHasil($where, 'hasil', 'ok')->result();
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu');
        $this->load->view('tuser/sidebar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('tuser/footer');
    }
    public function karyawan()
    {
        $data['hal'] = 'Dashboard';
        $where = array(
            'tahun' => date('Y')
        );
        $data['laporan']     = $this->Mhasil->getHasil($where, 'hasil', 'ok')->result();
        $this->load->view('tuser/head', $data);
        $this->load->view('dashboard/karyawan');
        $this->load->view('tuser/footer');
    }

    public function login()
    {
        $this->load->view('tLogin/login');
    }
    public function validate()
    {
        $where = array(
            'nik' => $this->input->post('nik'),
            'password' => md5($this->input->post('password')),
            'jabatan' => 'manager'
        );
        $cek = $this->Mglobal->get('karyawan', $where)->row();
        if ($cek) {
            $data_session = array(
                'nik' => $cek->nik,
                'nama' => $cek->nmkaryawan,
                'status' => "login_admin",
                'level' => $cek->jabatan
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('index.php/dashboard'));
        } else {
            redirect(base_url('index.php/dashboard/login'));
        }
    }
    function logout()
    {
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
        $this->session->sess_destroy();
        redirect(base_url('index.php/dashboard/login'));
    }
}
