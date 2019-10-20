<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4>Detail Gaji</h4>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button><hr>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="formModal">Input Detail Gaji</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="<?php echo base_url('manpower/tambah') ?>" method="post">
              <div class="form-group">
                <label>Tanggal</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="date" class="form-control" placeholder="tanggal" name="tanggal" required>
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Jam Keluar</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <select class="form-control" name="jam_keluar">
                    <option disabled selected>- Pilih Jam Keluar -</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                  </select>
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Non Stop</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <select class="form-control" name="non_stop">
                    <option disabled selected>- Pilih Non Stop -</option>
                    <option value="0">tidak</option>
                    <option value="1">iya</option>
                  </select>
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mr-1" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
