<?php

class Mabsensi extends CI_Model
{
    private $table = 'absensi a';
    function getData($where = null)
    {
        if ($where == null) {
            $this->db->select("*,sum(a.keterangan='hadir') as hadir,sum(a.keterangan='sakit') as sakit,sum(a.keterangan='alfa') as alfa,sum(a.keterangan='izin') as izin,count(k.nik) as karyawan");
            $this->db->join('karyawan k', 'k.nik=a.nik');
            $this->db->group_by('a.tgl_absen');
            return $this->db->get($this->table);
        } else {
            $this->db->join('karyawan k', 'k.nik=a.nik');
            $this->db->where($where);
            return $this->db->get($this->table);
        }
    }

    function getKaryawan()
    {
        $this->db->select("*,(sum(a.keterangan='hadir') / count(a.keterangan) * 100) as absen");
        $this->db->join('karyawan k', 'k.nik=a.nik');
        $this->db->where("k.jabatan = 'karyawan'");
        $this->db->group_by('k.nik');
        return $this->db->get($this->table);
    }
}
