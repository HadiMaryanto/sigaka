
<div class="col-12">
  <div class="card">
    <div class="card-header">
    <h4>Data Gaji Contract Bulan <?php $tanggal = explode('-',$bulan); echo bulan($tanggal[1]).' '.$tanggal[0]; ?></h4>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
      <a href="<?php echo base_url('contract/bank/'.$this->uri->segment(3))  ?>" class="btn btn-warning" >Laporan Bank</a><hr>
      <button type="button" name="button" class="btn btn-success" onclick="tabletoExcel('laporan-gaji', 'laporan gaji karyawan')">cetak laporan</button>
    </div>
      <div class="table-responsive">
        <table class="table table-striped table-responsive" id="laporan-gaji">
          <thead>
          <tr>
            <th rowspan="3" class="text-center">No</th>
            <th rowspan="3" class="text-center">Nama</th>
            <th rowspan="3" class="text-center">NIK</th>
            <th rowspan="3">Jabatan</th>
            <th colspan="3" class="text-center">Kehadiran</th>
            <th colspan="3" class="text-center">Upah Kerja</th>
            <th rowspan="3">Tunjangan</th>
            <th rowspan="3">Total Gaji</th>
            <th colspan="7" class="text-center">Potongan</th>
            <th rowspan="3">Total Potongan</th>
            <th rowspan="3">Total Gaji yg Diterima</th>
            <th rowspan="3">Nomor Rekening</th>
            <th rowspan="3">Keterangan</th>
          </tr>
          <tr>
            <th rowspan="2">Basic/Hari</th>
            <th rowspan="2">Uang Hadir/Hari</th>
            <th rowspan="2">Uang Makan/Hari</th>
            <th rowspan="2">Lembur/Jam</th>
            <th rowspan="2">Basic/Hari</th>
            <th rowspan="2">Uang Makan/Hari</th>
            <th rowspan="2">Lembur/Jam</th>
            <th colspan="4" class="text-center">Jamsostek</th>
            <th rowspan="2">Pinjaman</th>
            <th rowspan="2">Rapel</th>
          </tr>
          <tr>
            <th>Kesehatan</th>
            <th>Ketenagakerjaan</th>
            <th>Dana Pensiun</th>
            <th>Total</th>
          </tr>
          </thead>

          <tbody>
            <?php if ($seluruh != null): ?>
              <?php
              $no = 1;
              foreach ($seluruh as $key => $value): ?>
              <?php
              if ($value['gaji_tipe'] == 'contract'): ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['karyawan_nama'] ?></td>
                <td><?php echo $value['karyawan_nik'] ?></td>
                <td><?php echo $value['jabatan_nama'] ?></td>
                <?php
                $basic = 0;
                $uangHadir = 0;
                $uangMakan = 0;
                $lembur = 0;
                $totalbasic = 0;
                $totalUangMakan = 0;
                $totalLembur = 0;
                $totalGaji = 0;
                ?>
                <?php
                foreach ($detail as $key2 => $value2): ?>
                  <?php
                  if ($value2['karyawan_nik'] == $value['karyawan_nik']): ?>
                  <?php
                  $basic = $basic + $value2['detail_basic'];
                  $uangHadir = $uangHadir + $value2['detail_uang_hadir'];
                  $uangMakan = $uangMakan + $value2['detail_uang_makan'];
                  $lembur = $lembur + $value2['detail_total_lembur'];
                  $totalhadir = $uangHadir * 15000;
                  $totalbasic = $value['jabatan_basic'] * $basic;
                  $totalUangMakan = $value['jabatan_uang_makan'] * $uangMakan;
                  $totalLembur = $value['jabatan_lembur'] * $lembur;
                  $totalGaji = $totalbasic + $totalUangMakan + $totalLembur + $totalhadir;
                   ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <td><?php echo $basic ?></td>
                <td><?php echo $uangHadir ?></td>
                <td><?php echo $uangMakan ?></td>
                <td><?php echo $lembur ?></td>
                <td><?php echo $value['jabatan_basic'] ?></td>
                <td><?php echo $value['jabatan_uang_makan'] ?></td>
                <td><?php echo $value['jabatan_lembur'] ?></td>
                <td></td>
                <td><?php echo $totalGaji ?></td>

                <?php
                $total = 0;
                $totalPin = 0;
                $totalDiterima = 0
                // if ($laporan[$key] == true):-
                // if ($laporan[$key]['potongan_gaji_id'] == $value['gaji_id'] ): ?>
                  <td><?php echo $value['potongan_jamsostek_kesehatan'] ?></td>
                  <td><?php echo $value['potongan_jamsostek_kerja'] ?></td>
                  <td><?php echo $value['potongan_dana_pensiun'] ?></td>
                  <td><?php
                   $total = $value['potongan_jamsostek_kesehatan'] + $value['potongan_jamsostek_kerja'] + $value['potongan_dana_pensiun'] ?>
                   <?php echo $total ?>
                 </td>
                  <td><?php echo $value['potongan_pinjaman'] ?></td>
                  <td><?php echo $value['potongan_rapel'] ?></td>
                  <td><?php $totalPin = $total + $value['potongan_pinjaman'] + $value['potongan_rapel'] ?>
                    <?php echo $totalPin ?>
                  </td>
                <!-- <?php //else: ?> -->
                  <!-- <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td> -->
                <!-- <?php //endif;
              //endif;
                 ?> -->
                 <?php $totalDiterima = $totalGaji - $totalPin ?>
                <td><?php echo $totalDiterima ?></td>
                <td><?php echo $value['karyawan_no_rekening'] ?></td>
                <td></td>
              </tr>
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
