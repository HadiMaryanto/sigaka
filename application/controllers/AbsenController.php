<?php

  /**
   *
   */
  class AbsenController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model("AbsenModel");
      $this->load->model("KaryawanModel");
      $this->load->helper('tgl_indo_helper');
      $this->load->model("GajiModel");
    }
    function index()
    {
      $data['absen'] = $this->AbsenModel->tampildata();
      $data['karyawan'] = $this->AbsenModel->tampil();
      $this->load->view('templates/header');
      $this->load->view('absen/index',$data);
      $this->load->view('templates/footer');
    }
    function tambah()
    {
      if (isset($_POST['submit'])) {
        $data = array(
          'absen_karyawan_nik'=>$this->input->post('karyawan_nik'),
          'absen_hari'=>hari_indo(date('l')),
          'absen_status'=>'normal'
        );
        $cekAbsen = $this->AbsenModel->cek_absen($data['absen_karyawan_nik'], date('Y-m-d'));
        if ($cekAbsen == null) {
          $gaji = $this->GajiModel->cek_gaji($data['absen_karyawan_nik']);
          $karyawan = $this->KaryawanModel->detail($data['absen_karyawan_nik']);
          $gajiTotal = $karyawan['jabatan_basic'];
          $gajiMakan = $karyawan['jabatan_uang_makan'];
          $bulan = $gaji['gaji_bulan_ke'];

          if ($gaji == null) {
            $gajiTotal = $karyawan['jabatan_basic'];
            $gajiMakan = $karyawan['jabatan_uang_makan'];
            $dataGaji = array(
              'gaji_karyawan_nik' =>$data['absen_karyawan_nik'],
              'gaji_uang_makan' =>$gajiMakan,
              'gaji_total' =>$gajiTotal,
              'gaji_bulan_ke'=>1
            );
            $simpanGaji = $this->GajiModel->tambah_gaji($dataGaji);
          }else {
            if (date('d') == 1) {
              $gajiTotal = $karyawan['jabatan_basic'];
              $gajiMakan = $karyawan['jabatan_uang_makan'];
              $bulan = $bulan + 1;

              $dataGaji = array(
                'gaji_karyawan_nik' =>$data['absen_karyawan_nik'],
                'gaji_uang_makan' =>$gajiMakan,
                'gaji_total' =>$gajiTotal,
                'gaji_bulan_ke'=>$bulan
              );
              $simpanGaji = $this->GajiModel->tambah_gaji($dataGaji);
            }else {
              $gajiId = $gaji['gaji_id'];
              $gajiTotal = $gajiTotal + $gaji['gaji_total'];
              $gajiMakan = $gajiMakan + $gaji['gaji_uang_makan'];

              $dataGaji = array(
                'gaji_uang_makan'=>$gajiMakan,
                'gaji_total'=>$gajiTotal
              );
              $ubahGaji = $this->GajiModel->ubah_gaji($gajiId,$dataGaji);
            }
          }

          $this->AbsenModel->simpan($data);
          $this->session->set_flashdata('alert', 'berhasil_tambah');
          redirect('absen');
        }else {
          $this->session->set_flashdata('alert', 'absen_sudah_ada');
          redirect('absen');
        }
      }
    }
    function edit()
    {
      if (isset($_POST['submit'])) {
        $id = $this->input->post('absen_id');
        $status = $this->input->post('status');
        $lembur = $this->input->post('lembur');

        $data = array(
          'absen_id'=>$id,
          'absen_status'=>$status,
          'absen_jam_lembur'=>$lembur
        );
        $this->AbsenModel->update($id,$data);

        $cekAbsen = $this->AbsenModel->lihat_absen($id);
        $gaji = $this->GajiModel->lihat_gaji($cekAbsen['karyawan_nik']);
        $gajiId = $gaji['gaji_id'];
        $gajiLembur = $gaji['gaji_lembur'];
        $gajiLembur = $gajiLembur + ($lembur * $gaji['jabatan_lembur']);
        $dataGaji = array(
          'gaji_lembur'=>$gajiLembur
        );
        $updategaji = $this->GajiModel->update_gaji($gajiId,$dataGaji);


        $this->session->set_flashdata('alert', 'berhasil_edit');
        redirect('absen');
      }
    }

  }



 ?>
