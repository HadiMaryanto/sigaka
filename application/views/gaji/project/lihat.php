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
  <div class="card">
    <div class="card-header">
    <h4>Data Gaji Project <?php $tanggal = explode('-',$bulan); echo bulan($tanggal[1]).' '.$tanggal[0]; ?></h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url('gaji')  ?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</a><hr>
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
              <?php

              if ($value['gaji_tipe'] == 'project'): ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $value['karyawan_nama'] ?></td>
                <td><?php echo $value['karyawan_nik'] ?></td>
                <td><?php echo $value['jabatan_nama'] ?></td>
                <td><?php echo $value['karyawan_bpjs'] ?>
              </td>
                <td>
                  <a href="<?php echo base_url('project/detail/').$value['gaji_id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                </td>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="formModal">Karyawan </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="<?php echo base_url('project/pekerjabaru/'.$this->uri->segment(3)) ?>" method="post">
              <div class="form-group">
                <label>Karyawan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                  <select class="form-control" name="namakaryawan">
                    <option disabled selected>- Nama Karyawan -</option>
                    <?php foreach ($karyawan as $key => $value): ?>
                      <option value="<?php echo $value['karyawan_nik'] ?>"><?php echo $value['karyawan_nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <input type="hidden" name="tipe">
              <button type="submit" class="btn btn-primary mr-1" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
