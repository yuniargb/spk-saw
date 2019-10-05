<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    private $hal = 'Penilaian';

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mglobal', 'Mhasil', 'Mkriteria', 'Mpenilaian', 'Mabsensi'));
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }
    // Halaman utama hasil
    public function index()
    {
        if ($this->input->post('tahun')) {
            $where = array('tahun' => $this->input->post('tahun'));
            $data['data']       = $this->Mpenilaian->getData($where)->result();
            $data['hasil']   = $this->Mhasil->getHasil($where, 'hasil', 'oke')->result();
        } else {
            $where = array('tahun' => date('Y'));
            $data['data']       = $this->Mpenilaian->getData()->result();
            $data['hasil']   = $this->Mhasil->getHasil($where, 'hasil', 'oke')->result();
        }
        $data['karyawan']   = $this->Mabsensi->getKaryawan()->result();
        $data['kriteria']   = $this->Mkriteria->getData()->result();
        $data['tahn']       = $this->input->post('tahun');
        $data['hal']        = $this->hal;
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu', $data);
        $this->load->view('tuser/sidebar', $data);
        $this->load->view('hasil/hasilutama', $data);
        $this->load->view('tuser/footer');
    }

    public function refreshHasil($tahun = null)
    {
        if ($tahun != null) {
            $where = array('tahun' => $tahun);
            $data       = $this->Mpenilaian->getData($where)->result();
        } else {
            $where = array('tahun' => date('Y'));
            $data       = $this->Mpenilaian->getData($where)->result();
        }
        $kriteria   = $this->Mkriteria->getData()->result();
        if ($data) {
            foreach ($data as $d) {
                $nikk = $d->nik;
                $tahunn = $d->tahun;
                $hasil = 0;
                foreach ($kriteria as $k) {
                    $kri = $k->kdkriteria;
                    $c = $this->Mhasil->cekHasil($tahunn, $nikk, $kri);
                    $hasil += $c;
                }
                $where = array(
                    'nik' => $nikk,
                    'tahun' => $tahunn,
                );
                $set = array(
                    'nik' => $nikk,
                    'tahun' => $tahunn,
                    'hasil' => $hasil,
                );
                $getHasil = $this->Mhasil->getHasil($where, 'hasil')->row();
                if (!$getHasil) {
                    $simpan = $this->Mglobal->simpan('hasil', $set);
                } else {
                    $update = $this->Mglobal->update('hasil', $set, $where);
                }
            }
            if ($simpan || $update) {
                $this->session->set_flashdata('sukses', 'data berhasil dihitung ulang');
                redirect(base_url('index.php/hasil'));
            } else {
                $this->session->set_flashdata('gagal', 'data gagal di dihitung ulang');
                redirect(base_url('index.php/hasil'));
            }
        } else {
            $this->session->set_flashdata('gagal', 'data gagal di dihitung ulang, tahun tidak di temukan!');
            redirect(base_url('index.php/hasil'));
        }
    }
}
