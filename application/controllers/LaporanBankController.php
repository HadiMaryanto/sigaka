<?php
  /**
   *
   */
  class LaporanBankController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('GajiModel','gaji');
    }

    public function index()
    {
      $data['bank'] = $this->gaji->bankLaporan();
      $this->load->view('templates/header');
      $this->load->view('laporan/laporanBank',$data);
      $this->load->view('templates/footer');
    }
  }

  ?>
