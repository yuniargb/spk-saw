
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    private $hal = 'Karyawan';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mglobal');
        $this->load->model('Mkaryawan');
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }
    // Halaman utama karyawan
    public function index()
    {
        $data['data'] = $this->Mkaryawan->getData()->result();
        $data['hal'] = $this->hal;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('karyawan/karyawanutama', $data);
        $this->load->view('tuser/footer');
    }
    // proses simpan tambah data
    public function tambah()
    {
        // form validasi
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|is_unique[karyawan.nik]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tglmasuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('tglkeluar', 'Tanggal Keluar', 'required');

        if ($this->form_validation->run() != false) {
            // untuk didalam array
            // sebelah kiri contoh 'nik' itu mengikuti field/kolom table di database
            // sebelah kanan contoh '$this->input->post('nik') itu mengikuti name yang ada di view karyawan/edit'
            $data = array(
                'nik'           => $this->input->post('nik'),
                'nmkaryawan'    => $this->input->post('nama'),
                'jenisk'        => $this->input->post('jk'),
                'tgl_lahir'     => $this->input->post('tgllahir'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'tgl_masuk'     => $this->input->post('tglmasuk'),
                'tgl_keluar'    => $this->input->post('tglkeluar'),
                'password'      => md5(date('dmY', strtotime($this->input->post('tgllahir')))),
            );

            $simpan = $this->Mglobal->simpan('karyawan', $data);

            // jika berhasil disimpan
            if ($simpan) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect('index.php/karyawan');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal disimpan');
                redirect('index.php/karyawan');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan');
            $data['data'] = $this->Mkaryawan->getData()->result();
            $data['hal'] = $this->hal;
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu');
            $this->load->view('tuser/sidebar');
            $this->load->view('karyawan/karyawanutama');
            $this->load->view('tuser/footer');
        }
    }
    // halaman edit karyawan
    public function edit($id = null)
    {
        $data['hal'] = $this->hal;
        $where = array('nik' => $id);
        $data['data'] = $this->Mkaryawan->getData($where)->row();
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('karyawan/karyawanedit', $data);
        $this->load->view('tuser/footer', $data);
    }
    // proses edit karyawan
    public function update()
    {
        // form validasi
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tglmasuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('tglkeluar', 'Tanggal Keluar', 'required');

        $where = array('nik' => $this->input->post('nik'));

        if ($this->form_validation->run() != false) {
            // untuk didalam array
            // sebelah kiri contoh 'nik' itu mengikuti field/kolom table di database
            // sebelah kanan contoh '$this->input->post('nik') itu mengikuti name yang ada di view karyawan/edit'
            $data = array(
                'nik'           => $this->input->post('nik'),
                'nmkaryawan'    => $this->input->post('nama'),
                'jenisk'        => $this->input->post('jk'),
                'tgl_lahir'     => $this->input->post('tgllahir'),
                'alamat'        => $this->input->post('alamat'),
                'jabatan'       => $this->input->post('jabatan'),
                'tgl_masuk'     => $this->input->post('tglmasuk'),
                'tgl_keluar'    => $this->input->post('tglkeluar'),
            );



            $update = $this->Mglobal->update('karyawan', $data, $where);

            // jika berhasil disimpan
            if ($update) {
                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                redirect('index.php/karyawan');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diedit');
                redirect('index.php/karyawan');
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
        $where = array('nik' => $id);
        $delete = $this->Mglobal->hapus('karyawan', $where);

        // jika berhasil disimpan
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
            redirect('index.php/karyawan');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus');
            redirect('index.php/karyawan');
        }
    }
}
