<?php
  /**
   *
   */
  class KaryawanModel extends CI_MODEL
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    function tampildata()
    {
      $this->db->from('sigaka_karyawan');
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
      $this->db->order_by('karyawan_tanggal_dibuat','desc');
      $query = $this->db->get();
      return $query->result_array();
    }
    function simpan($data)
    {
      $this->db->insert('sigaka_karyawan', $data);
    }
    function edit($id,$data)
    {
      $this->db->where('karyawan_nik',$id);
      $this->db->update('sigaka_karyawan',$data);
    }
    function get_id($id)
    {
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
      $dapat = array('karyawan_nik'=>$id);
      return $this->db->get_where('sigaka_karyawan',$dapat);
    }
    function deletekaryawan($id)
    {
      $this->db->delete('sigaka_karyawan',$id);
    }
    function detail($id)
    {
      $this->db->select('*');
      $this->db->from('sigaka_karyawan');
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
      $this->db->where('karyawan_nik',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
  }


 ?>
