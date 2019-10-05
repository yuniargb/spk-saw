<?php

class Mpenilaian extends CI_Model
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

    function cekData($where)
    {
        $this->db->where($where);
        return $this->db->get($this->table);
    }

    public function cekNilai($where)
    {
        $this->db->where($where);
        return $this->db->get($this->table)->row_array();
    }
    public function cekEdit($where)
    {
        $this->db->where($where);
        $k = $this->db->get($this->table)->row();
        return $k->nilai;
    }
}
