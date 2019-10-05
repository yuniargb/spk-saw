
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    private $hal = 'Kriteria';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mglobal');
        $this->load->model('Mkriteria');
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }
    // Halaman utama kriteria
    public function index()
    {
        $data['data'] = $this->Mkriteria->getData()->result();
        $data['hal'] = $this->hal;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('kriteria/kriteriautama', $data);
        $this->load->view('tuser/footer');
    }
    // proses simpan tambah data
    public function tambah()
    {
        // form validasi
        $this->form_validation->set_rules('kdkriteria', 'Kode Kriteria', 'required|is_unique[kriteria.kdkriteria]|min_length[2]|max_length[3]', array(
            'is_unique'     => 'Data %s sudah ada.',
        ));
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');

        if ($this->form_validation->run() != false) {
            $data = array(
                'kdkriteria'    => $this->input->post('kdkriteria'),
                'nmkriteria'    => $this->input->post('nama'),
                'bobot'         => $this->input->post('bobot'),
                'tipe'          => $this->input->post('tipe'),
            );

            $simpan = $this->Mglobal->simpan('kriteria', $data);

            // jika berhasil disimpan
            if ($simpan) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect('index.php/kriteria');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal disimpan');
                redirect('index.php/kriteria');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan');
            $data['data'] = $this->Mkriteria->getData()->result();
            $data['hal'] = $this->hal;
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu');
            $this->load->view('tuser/sidebar');
            $this->load->view('kriteria/kriteriautama');
            $this->load->view('tuser/footer');
        }
    }
    // halaman edit karyawan
    public function edit($id = null)
    {
        $data['hal'] = $this->hal;
        $where = array('kdkriteria' => $id);
        $data['data'] = $this->Mkriteria->getData($where)->row();
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('kriteria/kriteriaedit', $data);
        $this->load->view('tuser/footer', $data);
    }
    // proses edit karyawan
    public function update()
    {
        // form validasi
        $this->form_validation->set_rules('kdkriteria', 'Kode Kriteria', 'required|min_length[2]|max_length[3]');
        $this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');

        $where = array('kdkriteria' => $this->input->post('kdkriteria'));

        if ($this->form_validation->run() != false) {
            $data = array(
                'kdkriteria'    => $this->input->post('kdkriteria'),
                'nmkriteria'    => $this->input->post('nama'),
                'bobot'         => $this->input->post('bobot'),
                'tipe'          => $this->input->post('tipe'),
            );
            $update = $this->Mglobal->update('kriteria', $data, $where);

            // jika berhasil disimpan
            if ($update) {
                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                redirect('index.php/kriteria');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diedit');
                redirect('index.php/kriteria');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal diedit');
            $data['hal'] = $this->hal;
            $data['data'] = $this->Mkaryawan->getData($where)->row();
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu', $data);
            $this->load->view('tuser/sidebar', $data);
            $this->load->view('karyawan/karyawanedit', $data);
            $this->load->view('tuser/footer', $data);
        }
    }
    // proses hapus karyawan
    public function delete($id = null)
    {
        $where = array('kdkriteria' => $id);
        $delete = $this->Mglobal->hapus('kriteria', $where);

        // jika berhasil disimpan
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
            redirect('index.php/kriteria');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus');
            redirect('index.php/kriteria');
        }
    }
}
