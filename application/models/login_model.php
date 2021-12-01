<?php

class Login_model extends CI_Model
{
    public function cari($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
    public function cek_login($username, $password)
    {
        $this->db->select("*");
        $this->db->from("akun");
        $this->db->where(array ("akun.email" => $username  ,'akun.password' => $password) );
        $this->db->join("karyawan" ," akun.id_karyawan  = karyawan.id_karyawan " , "left");
        return $this->db->get();
    }  
}