      <div class="col-12">
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">absen </button><hr>

              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        No
                      </th>
                      <th>Nama Karyawan</th>
                      <th>Hari</th>
                      <th>Tanggal</th>
                      <th>Per Jam</th>
                      <th>Status</th>
                      <th>Lembur</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($absen as $key => $value): ?>
                      <tr>
                        <td><?=$no ?></td>
                        <td><?=$value['karyawan_nama']?></td>
                        <td><?=$value['absen_hari']?></td>
                        <td><?= date_indo($value['absen_date_created'])?></td>
                        <td><?=$value['absen_jam_lembur']?></td>
                        <td>
                          <?php
                            if ($value['absen_status'] == 'normal') {
                          ?>
                          <div class="badge badge-primary">
                            <?=$value['absen_status']?>
                          </div>
                        </td>
                        <td>
                          <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1<?php echo $value['absen_id'] ?>">Lembur</a>
                        </td>
                      <?php }elseif ($value['absen_status'] == 'lembur') { ?>
                        <div class="badge badge-success">
                          <?=$value['absen_status']?>
                        </div>
                        <td>
                          <a class="btn disabled btn-success" data-toggle="modal" data-target="#exampleModal1<?php echo $value['absen_id'] ?>">Lembur</a>
                        </td>
                      <?php } ?>
                      </tr>
                    <?php
                    $no++;
                    endforeach; ?>

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
                <h5 class="modal-title" id="formModal">Absen Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate="" action="<?php echo base_url('absen/tambah') ?>" method="post">
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <select name="karyawan_nik" class="form-control" required>
                          <option selected disabled>pilih karyawan</option>
                          <?php foreach ($karyawan as $key => $value):  ?>
                          <option value="<?php echo $value['karyawan_nik'] ?>"><?php echo $value['karyawan_nama'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary" name="submit">hadir</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php foreach ($absen as $key => $value):

          ?>
          <div class="modal fade" id="exampleModal1<?php echo $value['absen_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formModal">Jam Lembur <?php echo $value['karyawan_nama'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="<?php echo base_url('absen/edit') ?>" method="post">
              <div class="form-group">
                <label>Jam Lembur</label>
                <div class="input-group">
                  <select name="lembur" class="form-control" required>
                    <option selected disabled>Per Jam</option>
                    <option value="1">1 jam</option>
                    <option value="2">2 jam</option>
                    <option value="3">3 jam</option>
                    <option value="4">4 jam</option>
                    <option value="5">5 jam</option>
                    <option value="6">6 jam</option>
                  </select>
                  <input type="hidden" name="absen_id" id="absen_id" value="<?php echo $value['absen_id']; ?>">
                  <input type="hidden" name="status" value="lembur">
                </div>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">lembur</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
