<?php if ($this->session->flashdata('alert') == 'berhasil_tambah') { ?>
  <div class="alert alert-primary alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>&times;</span>
      </button>
      Berhasil Menambah Pekerja Baru
    </div>
  </div>
<?php }elseif ($this->session->flashdata('alert') == 'berhasil_edit') { ?>
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>&times;</span>
      </button>
      Berhasil Mengubah Data
    </div>
  </div>
<?php }elseif ($this->session->flashdata('alert') == 'gagal_tambah') { ?>
<div class="alert alert-danger alert-dismissible show fade">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
    <span>&times;</span>
    </button>
    Nama Sudah Ada
  </div>
</div>
<?php } ?>
<div class="col-12">
  <div class="d-flex justify-content-between mb-3">
  <button type="button" name="button" class="btn btn-success" onclick="tabletoExcel('laporan', 'laporan gaji karyawan')">cetak laporan</button>
</div>
  <div class="card" id="laporan">
    <div class="card-header">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Total Gaji yang di terima</th>
              <th>No Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($seluruh != null): ?>
              <?php
              $no = 1;
              foreach ($seluruh as $key => $value): ?>
              <?php

              if ($value['gaji_tipe'] == 'manpower'): ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['karyawan_nama'] ?></td>
                <?php
                $basic = 0;
                $uangMakan = 0;
                $lembur = 0;
                $totalbasic = 0;
                $totalUangMakan = 0;
                $totalLembur = 0;
                $totalGaji = 0
                ?>
                <?php foreach ($detail as $key2 => $value2): ?>
                  <?php if ($value2['karyawan_nik'] == $value['karyawan_nik']): ?>
                    <?php
                    $basic = $basic + $value2['detail_basic'];
                    $uangMakan = $uangMakan + $value2['detail_uang_makan'];
                    $lembur = $lembur + $value2['detail_total_lembur'];
                    $totalbasic = $value['jabatan_basic'] * $basic;
                    $totalUangMakan = $value['jabatan_uang_makan'] * $uangMakan;
                    $totalLembur = $value['jabatan_lembur'] * $lembur;
                    $totalGaji = $totalbasic + $totalUangMakan + $totalLembur;
                     ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php
                $total = 0;
                $totalPin = 0;
                $totalDiterima = 0;
                $total = $value['potongan_jamsostek_kesehatan'] + $value['potongan_jamsostek_kerja'] + $value['potongan_dana_pensiun'];
                $totalPin = $total + $value['potongan_pinjaman'] + $value['potongan_rapel'];
                $totalDiterima = $totalGaji - $totalPin;
                ?>
                <td><?php echo $totalDiterima; ?></td>
                <td><?php echo $value['karyawan_no_rekening'] ?></td>
                <td></td>
              </tr>
              <?php $no++;endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table><br>

        <div class="card-header">
          <h4>Mandiri</h4>
        </div>
        <table class="table table-striped example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Total Gaji yang di terima</th>
              <th>No Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($seluruh != null): ?>
              <?php
              $no = 1;
              foreach ($seluruh as $key => $value): ?>
              <?php

              if ($value['gaji_tipe'] == 'manpower'): ?>
              <tr>
                <?php if ($value['karyawan_nama_rekening'] == 'mandiri'): ?>
                <td><?php echo $no ?></td>
                <td><?php echo $value['karyawan_nama'] ?></td>
                <?php
                $basic = 0;
                $uangMakan = 0;
                $lembur = 0;
                $totalbasic = 0;
                $totalUangMakan = 0;
                $totalLembur = 0;
                $totalGaji = 0
                ?>
                <?php foreach ($detail as $key2 => $value2): ?>
                  <?php if ($value2['karyawan_nik'] == $value['karyawan_nik']): ?>
                    <?php
                    $basic = $basic + $value2['detail_basic'];
                    $uangMakan = $uangMakan + $value2['detail_uang_makan'];
                    $lembur = $lembur + $value2['detail_total_lembur'];
                    $totalbasic = $value['jabatan_basic'] * $basic;
                    $totalUangMakan = $value['jabatan_uang_makan'] * $uangMakan;
                    $totalLembur = $value['jabatan_lembur'] * $lembur;
                    $totalGaji = $totalbasic + $totalUangMakan + $totalLembur;
                     ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php
                $total = 0;
                $totalPin = 0;
                $totalDiterima = 0;
                $total = $value['potongan_jamsostek_kesehatan'] + $value['potongan_jamsostek_kerja'] + $value['potongan_dana_pensiun'];
                $totalPin = $total + $value['potongan_pinjaman'] + $value['potongan_rapel'];
                $totalDiterima = $totalGaji - $totalPin;
                ?>
                <td><?php echo $totalDiterima; ?></td>
                <td><?php echo $value['karyawan_no_rekening'] ?></td>
                <td></td>
              </tr>
              <?php endif; ?>
              <?php $no++;endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table><br>

        <div class="card-header">
          <h4>SinarMas</h4>
        </div>
        <table class="table table-striped example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Total Gaji yang di terima</th>
              <th>No Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($seluruh != null): ?>
              <?php
              $no = 1;
              foreach ($seluruh as $key => $value): ?>
              <?php

              if ($value['gaji_tipe'] == 'manpower'): ?>
              <tr>
                <?php if ($value['karyawan_nama_rekening'] == 'sinarmas'): ?>
                <td><?php echo $no ?></td>
                <td><?php echo $value['karyawan_nama'] ?></td>
                <?php
                $basic = 0;
                $uangMakan = 0;
                $lembur = 0;
                $totalbasic = 0;
                $totalUangMakan = 0;
                $totalLembur = 0;
                $totalGaji = 0
                ?>
                <?php foreach ($detail as $key2 => $value2): ?>
                  <?php if ($value2['karyawan_nik'] == $value['karyawan_nik']): ?>
                    <?php
                    $basic = $basic + $value2['detail_basic'];
                    $uangMakan = $uangMakan + $value2['detail_uang_makan'];
                    $lembur = $lembur + $value2['detail_total_lembur'];
                    $totalbasic = $value['jabatan_basic'] * $basic;
                    $totalUangMakan = $value['jabatan_uang_makan'] * $uangMakan;
                    $totalLembur = $value['jabatan_lembur'] * $lembur;
                    $totalGaji = $totalbasic + $totalUangMakan + $totalLembur;
                     ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <?php
                $total = 0;
                $totalPin = 0;
                $totalDiterima = 0;
                $total = $value['potongan_jamsostek_kesehatan'] + $value['potongan_jamsostek_kerja'] + $value['potongan_dana_pensiun'];
                $totalPin = $total + $value['potongan_pinjaman'] + $value['potongan_rapel'];
                $totalDiterima = $totalGaji - $totalPin;
                ?>
                <td><?php echo $totalDiterima; ?></td>
                <td><?php echo $value['karyawan_no_rekening'] ?></td>
                <td></td>
              </tr>
              <?php endif; ?>
              <?php $no++;endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function tabletoExcel(table, name) {
        var uri = 'data:application/vnd.ms-excel;base64,'
              , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
              , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))); }
              , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }); };
            if (!table.nodeType) table = document.getElementById(table);
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML };
            window.location.href = uri + base64(format(template, ctx));

    }

</script>
