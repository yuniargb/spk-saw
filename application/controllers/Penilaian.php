
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    private $hal = 'Penilaian';

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mglobal', 'Mkaryawan', 'Mkriteria', 'Mpenilaian', 'Mabsensi'));
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }
    // Halaman utama penilaian
    public function index()
    {
        $data['data']       = $this->Mpenilaian->getData()->result();
        $data['karyawan']   = $this->Mabsensi->getKaryawan()->result();
        $data['kriteria']   = $this->Mkriteria->getData()->result();
        $data['hal']        = $this->hal;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('penilaian/penilaianutama', $data);
        $this->load->view('tuser/footer');
    }
    // proses simpan tambah data
    public function tambah()
    {
        $kriteria   = $this->Mkriteria->getData()->result();

        $where = array(
            'tahun' => $this->input->post('tahun'),
            'nik'   => $this->input->post('karyawan')
        );
        $cek        = $this->Mpenilaian->cekData($where)->row();

        $data['data']       = $this->Mpenilaian->getData()->result();
        $data['karyawan']   = $this->Mabsensi->getKaryawan()->result();
        $data['kriteria']   = $kriteria;
        $data['hal']        = $this->hal;

        if ($cek) {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan, karyawan dan tahun sudah pernah di input');
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu');
            $this->load->view('tuser/sidebar');
            $this->load->view('penilaian/penilaianutama', $data);
            $this->load->view('tuser/footer');
        } else {
            foreach ($kriteria as $k) {
                $this->form_validation->set_rules($k->kdkriteria, $k->nmkriteria, 'required|numeric');
            }
            if ($this->form_validation->run() != false) {

                foreach ($kriteria as $k) {
                    $data = array(
                        'nilai'         => $this->input->post($k->kdkriteria),
                        'nik'           => $this->input->post('karyawan'),
                        'tahun'         => $this->input->post('tahun'),
                        'kdkriteria'    => $k->kdkriteria
                    );
                    $simpan = $this->Mglobal->simpan('penilaian', $data);
                }

                // jika berhasil disimpan
                if ($simpan) {
                    $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                    redirect('index.php/penilaian');
                } else {
                    $this->session->set_flashdata('gagal', 'Data gagal disimpan');
                    redirect('index.php/penilaian');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal disimpan');
                $this->load->view('tuser/head', $data);
                $this->load->view('tuser/menu');
                $this->load->view('tuser/sidebar');
                $this->load->view('penilaian/penilaianutama', $data);
                $this->load->view('tuser/footer');
            }
        }
        // form validasi
    }
    // halaman edit penilaian
    public function edit($nik, $tahun)
    {
        $data = array(
            'p.nik' => $nik,
            'p.tahun' => $tahun
        );
        $data['data']       = $this->Mpenilaian->getData($data)->row();
        $data['karyawan']   = $this->Mabsensi->getKaryawan()->result();
        $data['kriteria']   = $this->Mkriteria->getData()->result();
        $data['hal']        = $this->hal;
        $data['nik']        = $nik;
        $data['tahun']      = $tahun;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('penilaian/penilaianedit', $data);
        $this->load->view('tuser/footer', $data);
    }
    // proses edit penilaian
    public function update()
    {
        $kriteria   = $this->Mkriteria->getData()->result();


        $data['data']       = $this->Mpenilaian->getData()->result();
        $data['karyawan']   = $this->Mabsensi->getKaryawan()->result();
        $data['kriteria']   = $kriteria;
        $data['hal']        = $this->hal;

        foreach ($kriteria as $k) {
            $this->form_validation->set_rules($k->kdkriteria, $k->nmkriteria, 'required|numeric');
        }
        if ($this->form_validation->run() != false) {

            foreach ($kriteria as $k) {

                $where1 = array(
                    'p.tahun' => $this->input->post('tahun'),
                    'p.nik'   => $this->input->post('karyawan'),
                    'p.kdkriteria'   => $k->kdkriteria
                );
                $cek       = $this->Mpenilaian->getData($where1)->row();
                if ($cek) {
                    $where = array(
                        'tahun' => $this->input->post('tahun'),
                        'nik'   => $this->input->post('karyawan'),
                        'kdkriteria'   => $k->kdkriteria
                    );

                    $data = array(
                        'nilai'         => $this->input->post($k->kdkriteria)
                    );
                    $update = $this->Mglobal->update('penilaian', $data, $where);
                } else {
                    $insert = array(
                        'nilai'         => $this->input->post($k->kdkriteria),
                        'nik'         => $this->input->post('karyawan'),
                        'tahun'         => $this->input->post('tahun'),
                        'kdkriteria'    => $k->kdkriteria
                    );
                    $update = $this->Mglobal->simpan('penilaian', $insert);
                }
            }

            // jika berhasil disimpan
            if ($update) {
                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                redirect('index.php/penilaian');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal diedit');
                redirect('index.php/penilaian');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal disimpan');
            $this->load->view('tuser/head', $data);
            $this->load->view('tuser/menu');
            $this->load->view('tuser/sidebar');
            $this->load->view('penilaian/penilaianedit', $data);
            $this->load->view('tuser/footer');
        }
    }
    // proses hapus penilaian
    public function delete($nik = null, $tahun = null)
    {
        $where = array(
            'tahun' => $tahun,
            'nik'   => $nik
        );
        $delete = $this->Mglobal->hapus('penilaian', $where);
        $delete1 = $this->Mglobal->hapus('normalisasi', $where);
        $delete2 = $this->Mglobal->hapus('hasil', $where);

        // jika berhasil disimpan
        if ($delete || $delete1 || $delete2) {
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
            redirect('index.php/penilaian');
        } else {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus');
            redirect('index.php/penilaian');
        }
    }
}
