<?php

class Mhasil extends CI_Model
{
    private $table = 'penilaian';
    function getData($where = null)
    {
        if ($where == null) {
            $this->db->join('karyawan k', 'k.nik=p.nik');
            $this->db->join('kriteria kr', 'kr.kdkriteria=p.kdkriteria');
            $this->db->group_by('p.nik');
            $this->db->group_by('p.tahun');
            return $this->db->get($this->table . ' p');
        } else {
            $this->db->join('karyawan k', 'k.nik=p.nik');
            $this->db->join('kriteria kr', 'kr.kdkriteria=p.kdkriteria');
            $this->db->group_by('p.nik');
            $this->db->group_by('p.tahun');
            $this->db->where($where);
            return $this->db->get($this->table . ' p');
        }
    }

    function getHasil($where, $table, $result = null)
    {
        if ($result != null) {
            $this->db->join('karyawan k', 'k.nik=' . $table . '.nik');
        }
        $this->db->order_by($table . '.hasil', 'DESC');
        return $this->db->get_where($table, $where);
    }

    public function getHsl($table, $nikk, $tahunn, $kri)
    {
        $data = array(
            'n.nik' => $nikk,
            'n.tahun' => $tahunn,
            'n.kdkriteria' => $kri
        );;
        $this->db->join('kriteria kk', 'kk.kdkriteria=n.kdkriteria');
        return $this->db->get_where($table . ' n', $data)->row_array();
    }
    public function getNormalisasi($table, $where)
    {
        $this->db->join('karyawan k', 'k.nik=n.nik');
        return $this->db->get_where($table . ' n', $where)->row_array();
    }

    function cekData($where)
    {
        $this->db->where($where);
        return $this->db->get($this->table);
    }

    // kb
    public function cekHasil($tahun, $nik, $kriteria)
    {
        $kri = $this->db->query('select * from kriteria where kdkriteria = "' . $kriteria . '"')->row_array();
        $nilai = $this->db->query('select * from ' . $this->table . ' where kdkriteria = "' . $kriteria . '" AND tahun="' . $tahun . '" AND nik=' . $nik . '')->row_array();
        if ($kri['tipe'] == "benefit") {
            if ($nilai) {
                $this->db->select('max(nilai) as n');
                $this->db->where('tahun', $tahun);
                $this->db->where('kdkriteria', $kriteria);
                $max = $this->db->get($this->table)->row_array();
                $hasil = $nilai['nilai'] / $max['n'];
                $jml = $hasil *  $kri['bobot'];
            }
        } else {
            if ($nilai) {
                $this->db->select('min(nilai) as n');
                $this->db->where('tahun', $tahun);
                $this->db->where('kdkriteria', $kriteria);
                $min = $this->db->get($this->table)->row_array();
                $hasil = $nilai['nilai'] / $min['n'];
                $jml = $hasil *  $kri['bobot'];
            }
        }
        $data = array(
            'nik' => $nik,
            'kdkriteria' => $kriteria,
            'nilai_normalisasi' => $hasil,
            'tahun' => $tahun
        );
        $where = array(
            'nik' => $nik,
            'kdkriteria' => $kriteria,
            'tahun' => $tahun
        );

        $cek = $this->db->get_where('normalisasi', $where)->row();
        if ($cek) {
            $this->db->update('normalisasi', $data, $where);
        } else {
            $this->db->insert('normalisasi', $data);
        }
        return $jml;
    }
}
