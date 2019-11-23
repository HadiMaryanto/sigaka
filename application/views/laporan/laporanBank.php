  <div class="card">
    <div class="card-body">
      <!-- <a href="<?php echo base_url('jabatan/tambah')  ?>" class="btn btn-primary">Tambah</a><hr> -->
      <div class="table-responsive">
        <table class="table table-striped" id="table-1">
          <thead>
            <tr>
              <th class="text-center">
                No
              </th>
              <th>Nama Karyawan</th>
              <th>Total Mandiri</th>
              <th>Nomor Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($bank as $key => $value) { ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $value['karyawan_nama'] ?></td>
                  <td></td>
                  <td><?php echo $value['karyawan_no_rekening' ]."  ".$value['karyawan_nama'] ?></td>
                  <td></td>

                </tr>
            <?php
            $no++;
          } ?>
        </tbody>
      </table><br>
        <div class="card-header">
          <h4>Mandiri</h4>
        </div>
        <table class="table table-striped" id="table-1">
          <thead>
            <tr>
              <th class="text-center">
                No
              </th>
              <th>Nama Karyawan</th>
              <th>Total Mandiri</th>
              <th>Nomor Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($bank as $key => $value) { ?>
                <?php if ($value['karyawan_nama_rekening'] == 'mandiri'): ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['karyawan_nama'] ?></td>
                    <td></td>
                    <td><?php echo $value['karyawan_no_rekening' ]."  ".$value['karyawan_nama'] ?></td>
                    <td></td>
                  </tr>
                <?php $no++; endif; ?>
            <?php
          } ?>
          </tbody>
        </table><br>
        <div class="card-header">
          <h4>SinarMas</h4>
        </div>
        <table class="table table-striped" id="table-1">
          <thead>
            <tr>
              <th class="text-center">
                No
              </th>
              <th>Nama Karyawan</th>
              <th>Total Mandiri</th>
              <th>Nomor Rekening</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($bank as $key => $value) { ?>
                <?php if ($value['karyawan_nama_rekening'] == 'sinarmas'): ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $value['karyawan_nama'] ?></td>
                    <td></td>
                    <td><?php echo $value['karyawan_no_rekening' ]."  ".$value['karyawan_nama'] ?></td>
                    <td></td>
                  </tr>
                <?php $no++; endif; ?>
            <?php
          } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
