
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

    private $hal = 'Absensi';

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mglobal', 'Mkaryawan', 'Mabsensi'));
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }
    // Halaman utama absensi
    public function index()
    {
        $data['data'] = $this->Mabsensi->getData()->result();
        $data['karyawan'] = $this->Mkaryawan->getData()->result();
        $data['hal'] = $this->hal;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('absensi/absensiutama', $data);
        $this->load->view('tuser/footer');
    }
    // proses simpan tambah data
    public function tambah()
    {
        // form validasi
        $this->form_validation->set_rules('tgl', 'Tanggal Absen', 'required|is_unique[absensi.tgl_absen]', array(
            'is_unique'     => 'Data %s sudah ada.',
        ));

        if ($this->form_validation->run() != false) {

            for ($i = 0; $i < count($this->input->post('nik')); $i++) {
                $data = array(
                    'nik'           => $this->input->post('nik')[$i],
                    'keterangan'    => $this->input->post('keterangan')[$i],
                    'tgl_absen'     => $this->input->post('tgl')
                );
                $simpan = $this->Mglobal->simpan('absensi', $data);
            }

            // jika berhasil disimpan
            if ($simpan) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect('index.php/absensi');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal disimpan');
                redirect('index.php/absensi');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan');
            $data['data'] = $this->Mabsensi->getData()->result();
            $data['karyawan'] = $this->Mkaryawan->getData()->result();
            $data['hal'] = $this->hal;
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu');
            $this->load->view('tuser/sidebar');
            $this->load->view('absensi/absensiutama', $data);
            $this->load->view('tuser/footer');
        }
    }
    // halaman edit absensi
    public function edit($id = null)
    {
        $data['hal']    = $this->hal;
        $where          = array('a.tgl_absen' => $id);
        $data['data']   = $this->Mabsensi->getData($where)->row();
        $data['absen'] = $this->Mabsensi->getData($where)->result();
        $data['karyawan'] = $this->Mkaryawan->getData()->result();
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('absensi/absensiedit', $data);
        $this->load->view('tuser/footer', $data);
    }
    // proses edit absensi
    public function update()
    {

        for ($i = 0; $i < count($this->input->post('kdabsen')); $i++) {
            $where = array(
                'kdabsen' => $this->input->post('kdabsen')[$i],
                'tgl_absen'     => $this->input->post('tgl')
            );
            $data = array(
                'keterangan'    => $this->input->post('keterangan')[$i]
            );
            $update = $this->Mglobal->update('absensi', $data, $where);
        }

        // jika berhasil disimpan
        if ($update) {
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect('index.php/absensi');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal diedit');
            redirect('index.php/absensi');
        }
    }
    // proses hapus absensi
    public function delete($id = null)
    {
        $where = array('tgl_absen' => $id);
        $delete = $this->Mglobal->hapus('absensi', $where);

        // jika berhasil disimpan
        if ($delete) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
            redirect('index.php/absensi');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus');
            redirect('index.php/absensi');
        }
    }
}
