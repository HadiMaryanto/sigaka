<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Karyawan</h4>
                  </div>
                  <form class="needs-validation" action="<?php echo base_url('karyawan/edit/'.$row['karyawan_nik']) ?>" method="post" novalidate="">
                  <div class="card-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="number" class="form-control" name="nik" value="<?php echo $row['karyawan_nik'] ?>" readonly="" required>
                      <div class="invalid-feedback">
                        NIK tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <input type="text" class="form-control" name="namakaryawan" value="<?php echo $row['karyawan_nama'] ?>" required>
                      <div class="invalid-feedback">
                        Nama Karyawan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="jabatan" disabled="" required>
                        <option value="" ><?php echo $row['jabatan_nama'] ?></option>
                        <!-- <?php foreach ($jabatan as $key => $value): ?>
                          <option value=""></option>
                          <option value="<?php echo $value['jabatan_id'] ?>"><?php echo $value['jabatan_nama'] ?></option>
                        <?php endforeach; ?> -->
                      </select>
                      <div class="invalid-feedback">
                        Jabatan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Rekening</label>
                      <input type="text" class="form-control" name="namarekening" value="<?php echo $row['karyawan_nama_rekening'] ?>" required>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No Rekening</label>
                      <input type="text" class="form-control" name="norekening" value="<?php echo $row['karyawan_no_rekening'] ?>" required>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>BPJS</label>
                      <input type="text" class="form-control" name="bpjs" value="<?php echo $row['karyawan_bpjs'] ?>" required>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Masuk</label>
                      <input type="date" class="form-control" name="tglmasuk" value="<?php echo $row['karyawan_tanggal_masuk'] ?>" readonly="" required>
                      <div class="invalid-feedback">
                        Tanggal Masuk tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="alamat" value="<?php echo $row['karyawan_alamat'] ?>" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" name="submit">Ubah</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
