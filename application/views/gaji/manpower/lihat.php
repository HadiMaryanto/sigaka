      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Data Gaji</h4>
          </div>
          <div class="card-body">
            <a href="<?php echo base_url('gaji')  ?>" class="btn btn-primary">Tambah</a><hr>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>BPJS</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($gaji != null): ?>
                    <?php
                    $no = 1;
                    foreach ($gaji as $key => $value): ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $value['karyawan_nama'] ?></td>
                        <td><?php echo $value['karyawan_nik'] ?></td>
                        <td><?php echo $value['jabatan_nama'] ?></td>
                        <td><?php echo $value['karyawan_bpjs'] ?>
                      </td>
                        <td>
                          <a href="<?php echo base_url('manpower/detail/').$value['gaji_id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                      </tr>
                    <?php $no++;endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
          </div>
