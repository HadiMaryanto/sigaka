<?php
  /**
   *
   */
  class GajiModel extends CI_MODEL
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    function cek_gaji($nik)
    {
      $this->db->select('*');
      $this->db->from('sigaka_gaji');
      $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');

      $this->db->where('gaji_karyawan_nik',$nik);
      $this->db->order_by('gaji_bulan_ke','DESC');
      $query = $this->db->get();
      return $query->row_array();
    }
    function tambah_gaji($data)
    {
      $this->db->insert('sigaka_gaji',$data);
    }
    function ubah_gaji($id,$data)
    {
      $this->db->where('gaji_id',$id);
      $this->db->update('sigaka_gaji',$data);
    }
    function get_idGaji($id)
    {
      $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
      $dapat = array('gaji_karyawan_nik'=>$id);
      return $this->db->get_where('sigaka_gaji',$dapat);
    }
    function lihat_gaji($id)
    {
      $this->db->select('*');
      $this->db->from('sigaka_gaji');
      $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
      $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
      $this->db->where('gaji_karyawan_nik',$id);
      $this->db->order_by('gaji_bulan_ke','DESC');
      $query = $this->db->get();
      return $query->row_array();
    }
    function update_gaji($id,$data)
    {
      $this->db->where('gaji_id',$id);
      $this->db->update('sigaka_gaji',$data);
    }
  }


 ?>
