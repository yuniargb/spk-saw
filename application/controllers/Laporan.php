<?php

class Laporan extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mhasil');
        if ($this->session->userdata('status') != "login_admin") {
            redirect(base_url("index.php/dashboard/login"));
        }
    }

    // view karyawan
    public function index()
    {
        $data['hal'] = 'Laporan';
        $this->load->view('tuser/head', $data);
        $this->load->view('tuser/menu');
        $this->load->view('tuser/sidebar');
        $this->load->view('laporan/tahun');
        $this->load->view('tuser/footer');
    }
    public function hasil()
    {
        ob_start();
        if ($this->input->post('tahun') == null) {
            $where = array(
                'tahun' => date('Y')
            );
        } else {
            $where = array(
                'tahun' => $this->input->post('tahun')
            );
        }
        $tanggal = date('d-m-Y');
        $data['laporan']     = $this->Mhasil->getHasil($where, 'hasil', 'ok')->result();
        $this->load->view('laporan/hasil', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('hasil-' . $tanggal . '.pdf');
        // $pdf->Output('Bukti Pesan '.$tanggal.'.pdf', 'D'); download

    }
}
