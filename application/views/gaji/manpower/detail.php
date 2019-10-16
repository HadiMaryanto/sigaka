<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4>Detail Gaji</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url('')  ?>" class="btn btn-primary">Tambah</a><hr>
      <div class="table-responsive">
        <table class="table table-striped" id="table-1" width="100%">
          <thead>
            <tr>
              <th rowspan="2">Schedule</th>
              <th rowspan="2">Basic</th>
              <th rowspan="2">Meal Allowance</th>
              <th colspan="4">Hours</th>
              <th rowspan="2">Basic</th>
              <th rowspan="2">Total Overtime</th>
              <th colspan="3">Overtime Detail</th>
            </tr>
            <tr>
              <th>In</th>
              <th>Out</th>
              <th>NS</th>
              <th>Overtime</th>
              <th>1,5x</th>
              <th>2,0</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($detail != null): ?>
              <?php
              $no = 1;
              foreach ($detail as $key => $value): ?>
                <tr>
                  <th><?php echo $no ?></th>
                  <th><?php echo $value['karyawan_nama'] ?></th>
                  <th><?php echo $value['karyawan_nik'] ?></th>
                  <th><?php echo $value['jabatan_nama'] ?></th>
                  <th>
                    <a href="<?php echo $value['gaji_id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                  </th>
                </tr>
              <?php $no++;endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>
