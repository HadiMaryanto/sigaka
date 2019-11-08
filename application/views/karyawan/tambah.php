<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Karyawan</h4>
                  </div>
                  <form class="needs-validation" action="<?php echo base_url('karyawan/tambah') ?>" method="post" novalidate="">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input id="nik" type="text" class="form-control" name="nik" required tabindex="1">
                      <div class="invalid-feedback">
                        NIK tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <input type="text" class="form-control" name="namakaryawan" tabindex="2" required>
                      <div class="invalid-feedback">
                        Nama Karyawan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="jabatan" tabindex="3">
                        <option selected disabled>pilih jabatan</option>
                        <?php foreach ($jabatan as $key => $value): ?>
                          <option value="<?php echo $value['jabatan_id']; ?>"><?php echo $value['jabatan_nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">
                        jabatan tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Rekening</label>
                      <select class="form-control" name="namarekening">
                        <option disabled selected>----pilih----</option>
                        <option value="mandiri">Mandiri</option>
                        <option value="sinarmas">SinarMas</option>
                      </select>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No Rekening</label>
                      <input type="text" class="form-control" name="norekening" tabindex="4" required>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>BPJS</label>
                      <select class="form-control" name="bpjs" required>
                        <option disabled selected>----pilih----</option>
                        <option value="ada"> Ada</option>
                        <option value="tidak">Tidak Ada</option>
                      </select>
                      <div class="invalid-feedback">
                        No Rekening tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Masuk</label>
                      <input type="date" class="form-control" name="tglmasuk" required tabindex="5">
                      <div class="invalid-feedback">
                         tgl tidak boleh kosong
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" tabindex="6" required></textarea>
                      <div class="invalid-feedback">
                        alamat tidak boleh kosong
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" name="simpan">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
