<?php
 /**
  *
  */
 class GajiModel extends CI_Model
 {

   function __construct()
   {
     parent::__construct();
     $this->load->database();
   }
   function tampildata()
   {
     $this->db->from('sigaka_karyawan');
     $query = $this->db->get();
     return $query->result_array();
   }
   public function cek_gaji($bulan)
   {
     $this->db->from('sigaka_gaji');
     $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
     $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
     $this->db->like('gaji_date_created',$bulan);
     $query = $this->db->get();
     return $query->result_array();
   }
   public function detail_gaji($id)
   {
     $this->db->from('sigaka_gaji_detail');
     $this->db->join('sigaka_gaji','sigaka_gaji.gaji_id = sigaka_gaji_detail.detail_gaji_id');
     $this->db->where('detail_gaji_id',$id);
     $query = $this->db->get();
     return $query->result_array();
   }
   public function lihat_gaji($id)
   {
     $this->db->from('sigaka_gaji');
     $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
     $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
     $this->db->where('gaji_id',$id);
     $query = $this->db->get();
     return $query->row_array();
   }
   public function simpan_detail_gaji($data)
   {
     $this->db->insert('sigaka_gaji_detail', $data);
   }
   public function pekerjabaru($data)
   {
     $this->db->insert('sigaka_gaji', $data);
   }
   public function validasi_gaji($nik,$tanggal)
   {
     $this->db->from('sigaka_gaji');
     $this->db->join('sigaka_karyawan','sigaka_karyawan.karyawan_nik = sigaka_gaji.gaji_karyawan_nik');
     $this->db->join('sigaka_jabatan','sigaka_jabatan.jabatan_id = sigaka_karyawan.karyawan_jabatan');
     $this->db->where('karyawan_nik',$nik);
     $this->db->like('gaji_date_created',$tanggal);
     $query = $this->db->get();
     return $query->result_array();
   }
   public function validasi_detail($tanggal,$tipe)
   {
     $this->db->from('sigaka_gaji_detail');
     $this->db->join('sigaka_gaji','sigaka_gaji.gaji_id = sigaka_gaji_detail.detail_gaji_id');
     $this->db->where('detail_tanggal',$tanggal);
     $this->db->where('gaji_tipe',$tipe);
     $query = $this->db->get();
     return $query->result_array();
   }
 }
