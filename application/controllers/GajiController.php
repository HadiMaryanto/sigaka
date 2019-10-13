<?php
  /**
   *
   */
  class GajiController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('GajiModel');
      $this->load->model('KaryawanModel');
      $this->load->helper('tgl_indo_helper');
    }
    function index()
    {
      $data['karyawan'] = $this->KaryawanModel->tampildata();
      $this->load->view('templates/header');
      $this->load->view('gaji/index',$data);
      $this->load->view('templates/footer');
    }
    function detail()
    {
      $id = $this->uri->segment(3);
      $data['row'] = $this->KaryawanModel->get_id($id)->row_array();
      $this->load->view('templates/header');
      $this->load->view('gaji/detail',$data);
      $this->load->view('templates/footer');
    }
  }


 ?>
