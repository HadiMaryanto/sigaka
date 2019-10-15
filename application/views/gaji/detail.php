<div class="col-12">
    <?php if ($this->session->flashdata('alert') == 'berhasil_tambah') { ?>
      <div class="alert alert-primary alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Menambah Data
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
    <?php }elseif ($this->session->flashdata('alert') == 'berhasil_hapus') {?>
      <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
          <span>&times;</span>
          </button>
          Berhasil Menghapus Data
        </div>
      </div>
    <?php } ?>
    <div class="card">
      <div class="card-header">
        <h4>Detail Gaji <?php echo $row['karyawan_nama'] ?></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th class="text-center">
                  No
                </th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Bulan ke</th>
                <th>Total Gaji</th>
                <th>Status Bayar</th>
                <th>Action</th>
              </tr>
            </thead>
                  <?php
                  $no = 1;
                  foreach ($gaji as $key => $value): ?>
                  <tr>
                    <td><?=$no ?></td>
                    <td><?=$value['gaji_karyawan_nik']?></td>
                    <td><?=$value['karyawan_nama']?></td>
                    <td><?=$value['jabatan_nama']?></td>
                    <td><?=$value['gaji_bulan_ke']?></td>
                    <td><?=$value['gaji_total'] + $value['gaji_lembur'] + $value['gaji_uang_makan']?></td>
                    <td>
                      <?php if ($value['gaji_status'] == 'belum') { ?>
                          <div class="badge badge-primary">
                            <?=$value['gaji_status']?>
                          </div>
                      <?php }elseif ($value['gaji_status'] == 'sudah') { ?>
                          <div class="badge badge-success">
                            <?=$value['gaji_status'] ?>
                          </div>
                      <?php } ?>

                    </td>
                  <td>
                    <a href="<?php echo base_url('gaji/detail'); ?>" class="btn btn-primary">rincian</a>
                    <a href="<?php echo base_url('gaji/detail'); ?>" class="btn btn-primary">bayar</a>
                    <a href="<?php echo base_url('gaji/detail'); ?>" class="btn btn-primary">print</a>
                  </td>
                </tr>
              <?php
              $no++;?>
                  <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
