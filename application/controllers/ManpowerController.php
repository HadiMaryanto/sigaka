<?php
/**
 *
 */
class ManpowerController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('GajiModel','gaji');
  }
  public function index()
  {
    if (isset($_POST['cari'])) {
      $tahun = $this->input->post('tahun');
      $bulan = $this->input->post('bulan');
      $dataBulan = $tahun.'-'.$bulan;
      // var_dump($dataBulan);die;
      redirect('manpower/lihat/'.$dataBulan);
    }else{
      $this->load->view('templates/header');
      $this->load->view('gaji/manpower/index');
      $this->load->view('templates/footer');
    }
  }
  public function lihat($dataBulan)
  {
    $cekGaji = $this->gaji->cek_gaji($dataBulan);
    $data = array();
    if ($cekGaji != null) {
      $data['gaji'] = $cekGaji;
    }else {
      $data['gaji'] = null;
    }
    $this->load->view('templates/header');
    $this->load->view('gaji/manpower/lihat',$data);
    $this->load->view('templates/footer');
  }
  public function detail($id)
  {
    $data['detail'] = $this->gaji->detail_gaji($id);
    $this->load->view('templates/header');
    $this->load->view('gaji/manpower/detail',$data);
    $this->load->view('templates/footer');
  }
}
