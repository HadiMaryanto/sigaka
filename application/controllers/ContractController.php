<?php
/**
 *
 */
class ContractController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('GajiModel','gaji');
    $this->load->model('KaryawanModel');
    $this->load->model('JabatanModel');
    $this->load->helper('tgl_indo_helper');

  }
  public function index()
  {
    if (isset($_POST['cari'])) {
      $tahun = $this->input->post('tahun');
      $bulan = $this->input->post('bulan');
      $dataBulan = $tahun.'-'.$bulan;
      // var_dump($dataBulan);die;
      redirect('contract/lihat/'.$dataBulan);
    }else{
      $this->load->view('templates/header');
      $this->load->view('gaji/contract/index');
      $this->load->view('templates/footer');
    }
  }
  public function lihat($dataBulan)
  {
    $cekGaji = $this->gaji->cek_gaji($dataBulan);
    $data = array();
    if ($cekGaji != null) {
      $data['gaji'] = $cekGaji;
      $data['karyawan'] = $this->gaji->tampildata();
      $data['bulan'] = $dataBulan;
    }else {
      $data['gaji'] = null;
      $data['karyawan'] = $this->gaji->tampildata();
      $data['bulan'] = $dataBulan;
    }
    $this->load->view('templates/header');
    $this->load->view('gaji/contract/lihat',$data);
    $this->load->view('templates/footer');
  }
  public function detail($id)
  {
    $data['id'] = $id;
    $data['detail'] = $this->gaji->detail_gaji($id);
    $data['gaji'] = $this->gaji->lihat_gaji($id);
    $data['potong'] = $this->gaji->potonganData($id);
    $data['ubahPotong'] = $this->gaji->utkPotong($id);
    $this->load->view('templates/header');
    $this->load->view('gaji/contract/detail',$data);
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
            $lembur2 = 2;
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
            $totalLembur = 1.5;
          }elseif ($jamKeluar == 11) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 1.5;
          }elseif ($jamKeluar == 14) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = $jamKeluar - 5;
            $lembur = 1.5;
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
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2)+1.5;
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 13;
            $jamBasic = 4;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - $lembur1_5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 1.5;
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
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 16 && $jamKeluar <= 17) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 1.5;
          }elseif ($jamKeluar == 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = 1;
            $lembur1_5 = 1;
            $lembur2 = 2 ;
            // $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 1.5 ;
          }elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 17;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $lembur - ($lembur1_5 *1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) - 0.5;
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
            $lembur2 = 2 ;
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
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 10 && $jamKeluar <= 11) {
            $basic = 0.5;
            $jamBasic = $jamKeluar - 7;
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 14 && $jamKeluar <= 15) {
            //masih ragu 0.5 atau 0
            $basic = 0.5;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 1.5;
          }elseif ($jamKeluar == 16) {
            $basic = 1;
            $uangMakan = 1;
            $jamBasic = $jamKeluar - 9;
            $totalLembur = 1.5;
          }elseif ($jamKeluar >= 17 && $jamKeluar <= 18) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - $lembur1_5 ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 1.5;
          }
          elseif ($jamKeluar >= 19) {
            $basic = 1;
            $uangMakan = 1;
            $jamLembur = $jamKeluar - 16;
            $jamBasic = 8;
            $lembur = $jamLembur + 1.5;
            $lembur1_5 = 1;
            $lembur2 = $jamLembur - ($lembur1_5 * 1.5) ;
            $totalLembur = ($lembur1_5 * 1.5) + ($lembur2 * 2) + 2.5;
          }
        }
      }
      $data = array(
        'detail_gaji_id'=>$id,
        'detail_tanggal'=>$tanggal,
        'detail_basic'=>$basic,
        'detail_uang_hadir'=>1,
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
      // echo "<pre>";
      // var_dump($data);die;
      $validasi = $this->gaji->validasi_detail($data['detail_tanggal'],'contract',$data['detail_gaji_id']);
      if ($validasi == null) {
        $this->gaji->simpan_detail_gaji($data);
        $this->session->set_flashdata('alert', '1berhasil_tambah');
        redirect('contract/detail/'.$id);
      }else{
      $this->session->set_flashdata('alert', '1gagall_tambah');
      redirect('contract/detail/'.$id);
    }
    }
  }
  public function pekerjabaru($tanggal)
  {
    if (isset($_POST['submit'])) {
      $data = array(
        'gaji_karyawan_nik'=>$this->input->post('namakaryawan'),
        'gaji_tipe'=>'contract'
      );
      $validasi = $this->gaji->validasi_gaji($data['gaji_karyawan_nik'],$tanggal);
      if ($validasi == null) {
        $this->gaji->pekerjabaru($data);
        $this->session->set_flashdata('alert', 'berhasil_tambah');
        redirect('contract/lihat/'.$tanggal);
      }else {
        $this->session->set_flashdata('alert', 'gagall_tambah');
        redirect('contract/lihat/'.$tanggal);
      }
      // echo "<pre>";
      // var_dump($data);die;
    }
  }
  public function potongan($id)
  {
    if (isset($_POST['submit'])) {
      $data = array(
        'potongan_gaji_id'=>$id,
        'potongan_jamsostek_kesehatan'=>$this->input->post('kesehatan'),
        'potongan_jamsostek_kerja'=>$this->input->post('ketenagakerjaan'),
        'potongan_dana_pensiun'=>$this->input->post('danapensiun'),
        'potongan_pinjaman'=>$this->input->post('pinjaman'),
        'potongan_rapel'=>$this->input->post('rapel')
      );
      // echo "<pre>";
      // var_dump($data);die;
      $this->gaji->potonganSimpan($data);
      $this->session->set_flashdata('alert', 'berhasil');
      redirect('contract/detail/'.$id);
    }
  }
  public function ubahPot($id)
  {
    if (isset($_POST['submit'])) {
      $idPotong = $this->input->post('potongId');
      $kesehatan = $this->input->post('kesehatan');
      $kerja = $this->input->post('ketenagakerjaan');
      $pensiun = $this->input->post('danapensiun');
      $pinjam = $this->input->post('pinjaman');
      $rapel = $this->input->post('rapel');

      $data = array(
        'potongan_jamsostek_kesehatan'=>$kesehatan,
        'potongan_jamsostek_kerja'=>$kerja,
        'potongan_dana_pensiun'=>$pensiun,
        'potongan_pinjaman'=>$pinjam,
        'potongan_rapel'=>$rapel
      );
      // echo "<pre>";
      // var_dump($data);die;
      $this->gaji->ubahPot($idPotong,$data);
      $this->session->set_flashdata('alert', 'berhasil_edit');
      redirect('contract/detail/'.$id);
    }
  }
  public function laporan($dataBulan)
  {
    $cekGaji = $this->gaji->cek_gaji($dataBulan);
    $data = array();
    if ($cekGaji != null) {
      $data['gaji'] = $cekGaji;
      // $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
      $data['bulan'] = $dataBulan;
    }else {
      $data['gaji'] = null;
      // $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
      $data['bulan'] = $dataBulan;
    }
    // $data['laporan'] = $this->gaji->detailPotongan($dataBulan);
    $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
    $data['detail'] = $this->gaji->detailSeluruh($dataBulan);
    $this->load->view('templates/header');
    $this->load->view('gaji/contract/laporan',$data);
    $this->load->view('templates/footer');
  }
  public function bank($dataBulan)
  {
      $cekGaji = $this->gaji->cek_gaji($dataBulan);
      $data = array();
      if ($cekGaji != null) {
        $data['gaji'] = $cekGaji;
        // $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
        $data['bulan'] = $dataBulan;
      }else {
        $data['gaji'] = null;
        // $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
        $data['bulan'] = $dataBulan;
      }
      // $data['bank'] = $this->gaji->LaporanBank($dataBulan);
      $data['seluruh'] = $this->gaji->dataSeluruh($dataBulan);
      $data['detail'] = $this->gaji->detailSeluruh($dataBulan);
      $this->load->view('templates/header');
      $this->load->view('gaji/contract/bank',$data);
      $this->load->view('templates/footer');

  }
}
