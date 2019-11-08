<div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pilih Bulan</h4>
                  </div>
                  <div class="card-body">
                    <form class="needs-validation" novalidate="" action="<?php echo base_url('manpower') ?>" method="post">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-2">
                            <label>Tahun</label>
                            <input type="number" max="2100" min="2000" name="tahun" class="form-control" required value="<?php echo date('Y') ?>">
                            <div class="invalid-feedback">
                              Nama Jabatan tidak boleh kosong
                            </div>
                          </div>
                          <div class="col-8">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan" required>
                              <option selected disabled>- pilih bulan - </option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                            <div class="invalid-feedback">
                              Nama Jabatan tidak boleh kosong
                            </div>
                          </div>
                          <div class="col-2">
                            <label><span style="color: white;">-</span> </label>
                            <input type="submit" name="cari" value="Lihat" class="btn btn-primary btn-block">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
