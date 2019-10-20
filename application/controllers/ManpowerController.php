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
    $data['id'] = $id;
    $data['detail'] = $this->gaji->detail_gaji($id);
    $this->load->view('templates/header');
    $this->load->view('gaji/manpower/detail',$data);
    $this->load->view('templates/footer');
  }
  public function tambah($id)
  {
    if (isset($_POST['submit'])) {
      $tanggal = $this->input->post('tanggal');
      $jamKeluar = $this->input->post('jam_keluar');
      $nonStop = $this->input->post('non_stop');

      $hari = date('D', strtotime($tanggal));
      $uangMakan = null;

      $jamLembur = null;
      $lembur = null;
      $lembur2 = null;
      $totalLembur = null;
      $lembur1_5 = null;
      $basic = null;

      // var_dump($hari);die;

      if ($hari === 'Sun') {
        if ($nonStop == '0') {
          $ns = 0;
          if ($jamKeluar >= 8 && $jamKeluar <= 11) {
            $jamLembur = $jamKeluar - 7;
            $lembur2 = $jamLembur;
          }elseif ($jamKeluar == 14) {
            $jamLembur = $jamKeluar - 9;
            $lembur2 = $jamLembur;
          }elseif ($jamKeluar >= 15 && $jamKeluar <= 18) {
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 9;
            $lembur2 = $jamLembur;
          }elseif ($jamKeluar >= 19) {
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 9.5;
            $lembur2 = $jamKeluar - 9;
          }
          $lembur = $jamLembur;
          $totalLembur = $lembur * 2;
        }else {
          $ns = 1;
          if ($jamKeluar >= 8 && $jamKeluar <= 11) {
            $jamLembur = $jamKeluar - 7;
            $lembur2 = $jamLembur + 2;
          }elseif ($jamKeluar == 14) {
            $jamLembur = $jamKeluar - 9;
            $lembur2 = $jamLembur + 2;
          }elseif ($jamKeluar >= 15 && $jamKeluar <= 18) {
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 9;
            $lembur2 = $jamLembur + 2;
          }elseif ($jamKeluar >= 19) {
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 9.5;
            $lembur2 = $jamLembur + 1.5;
          }
          $lembur = $jamLembur + 1.5;
          $totalLembur = $lembur * 2;
        }
      }
      elseif ($hari === 'Sat') {
        if ($nonStop == '0') {
          $ns = 0;
          if ($jamKeluar >= 8 && $jamKeluar <= 10) {
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar == 11) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar == 14) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = $jamKeluar - 5;
            $lembur = $jamLembur;
            $lembur1_5 = $jamLembur;
            $totalLembur = $lembur1_5 * 1.5;
          }elseif ($jamKeluar >= 15 && $jamKeluar <= 17) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = $jamKeluar - 5;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = 4;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = 4;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 * 1.5);
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }
        }else {
          $ns = 1;
          if ($jamKeluar >= 8 && $jamKeluar <= 10) {
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar == 11) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar == 14) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = $jamKeluar - 5;
            $lembur = 2.5;
            $lembur1_5 = $jamLembur;
            $totalLembur = ($lembur1_5 * 1.5) + $lembur;
          }elseif ($jamKeluar >= 15 && $jamKeluar <= 17) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = $jamKeluar - 5;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - $lembur1_5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2)+2.5;
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = 4;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - $lembur1_5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = 4;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - ($lembur1_5 * 1.5);
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2)+2.5;
          }
        }
      }
      elseif ($hari === 'Fri') {
        if ($nonStop == '0') {
          $ns = 0;
          if ($jamKeluar >= 8 && $jamKeluar <= 9) {
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
          }elseif ($jamKeluar >= 16 && $jamKeluar <= 17) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5 ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }
          elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 *1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }
        }else {
          $ns = 1;
          if ($jamKeluar >= 8 && $jamKeluar <= 9) {
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 16 && $jamKeluar <= 17) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 2.5;
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5 ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 *1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }
        }
      }
      else {
        if ($nonStop == '0') {
          $ns = 0;
          if ($jamKeluar >= 8 && $jamKeluar <= 9) {
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            //masih ragu 0.5 atau 0
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
          }elseif ($jamKeluar == 16) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
          }elseif ($jamKeluar >= 17 && $jamKeluar <= 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5 ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }
          elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 * 1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2);
          }
        }else {
          $ns = 1;
          if ($jamKeluar >= 8 && $jamKeluar <= 9) {
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            //masih ragu 0.5 atau 0
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 2.5;
          }elseif ($jamKeluar == 16) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 2.5;
          }elseif ($jamKeluar >= 17 && $jamKeluar <= 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $lembur - $lembur1_5 ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }
          elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 * 1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }
        }
      }
      $data = array(
        'detail_gaji_id'=>$id,
        'detail_tanggal'=>$tanggal,
        'detail_basic'=>$basic,
        'detail_uang_makan'=>$uangMakan,
        'detail_jam_keluar'=>$jamKeluar,
        'detail_non_stop'=>$ns,
        'detail_jam_lembur'=>$jamLembur,
        'detail_jam_basic'=>$jamBasic,
        'detail_lembur'=>$lembur,
        'detail_lembur_1_5'=>$lembur1_5,
        'detail_lembur_2'=>$lembur2,
        'detail_total_lembur'=>$totalLembur
      );
      $this->gaji->simpan_detail_gaji($data);
      redirect('manpower/detail/'.$id);
      // echo "<pre>";
      // var_dump($data);die;
    }
  }
}
