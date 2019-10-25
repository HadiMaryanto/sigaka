<?php

  /**
   *
   */
  class KaryawanController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('JabatanModel');
      $this->load->model('KaryawanModel');
      $this->load->helper('tgl_indo_helper');
    }
    function index()
    {
      $data['karyawan'] = $this->KaryawanModel->tampildata();
      $this->load->view('templates/header');
      $this->load->view('karyawan/index',$data);
      $this->load->view('templates/footer');
    }
    function tambah()
    {
      if (isset($_POST['simpan'])) {
        $data = array(
          'karyawan_nik'=>$this->input->post('nik'),
          'karyawan_nama'=>$this->input->post('namakaryawan'),
          'karyawan_jabatan'=>$this->input->post('jabatan'),
          'karyawan_no_rekening'=>$this->input->post('norekening'),
          'karyawan_tanggal_masuk'=>$this->input->post('tglmasuk'),
          'karyawan_alamat'=>$this->input->post('alamat')
        );
        $data = $this->KaryawanModel->simpan($data);
        $this->session->set_flashdata('alert', 'berhasil_tambh');
        redirect('karyawan');
      }
      $data['jabatan'] = $this->JabatanModel->tampildata();
      $this->load->view('templates/header');
      $this->load->view('karyawan/tambah',$data);
      $this->load->view('templates/footer');
    }
    function edit()
    {
      $id = $this->uri->segment(3);
      if (isset($_POST['submit'])) {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('namakaryawan');
        // $jabatan = $this->input->post('jabatan');
        $rekening = $this->input->post('norekening');
        $tglmasuk = $this->input->post('tglmasuk');
        $alamat = $this->input->post('alamat');

        $data = array(
          'karyawan_nik'=>$nik,
          'karyawan_nama'=>$nama,
          // 'karyawan_jabatan'=>$jabatan,
          'karyawan_no_rekening'=>$rekening,
          'karyawan_tanggal_masuk'=>$tglmasuk,
          'karyawan_alamat'=>$alamat
        );
        $this->KaryawanModel->edit($id,$data);
        $this->session->set_flashdata('alert', 'berhasil_edit');
        redirect('karyawan');
      }else {
        // $data['jabatan'] = $this->JabatanModel->tampildata();
        $data['row'] = $this->KaryawanModel->get_id($id)->row_array();
        $this->load->view('templates/header');
        $this->load->view('karyawan/edit',$data);
        $this->load->view('templates/footer');
      }
    }
    function delete()
    {
      $id = $this->uri->segment(3);
      $data = array("karyawan_nik"=>$id);
      $this->KaryawanModel->deletekaryawan($data);
      $this->session->set_flashdata('alert', 'berhasil_hapus');
      redirect('karyawan');
    }
  }

 ?>
