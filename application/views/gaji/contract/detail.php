<?php if ($this->session->flashdata('alert') == '1berhasil_tambah') { ?>
  <div class="alert alert-primary alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>&times;</span>
      </button>
      Berhasil Menambah Gaji Baru
    </div>
  </div>
<?php }elseif ($this->session->flashdata('alert') == '1berhasil_edit') { ?>
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
      <span>&times;</span>
      </button>
      Berhasil Mengubah Data
    </div>
  </div>
<?php }elseif ($this->session->flashdata('alert') == '1gagall_tambah') { ?>
<div class="alert alert-danger alert-dismissible show fade">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
    <span>&times;</span>
    </button>
    Hari ini sudah diinput gaji
  </div>
</div>
<?php }elseif ($this->session->flashdata('alert') == 'berhasil') { ?>
<div class="alert alert-info alert-dismissible show fade">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
    <span>&times;</span>
    </button>
    Potongan Berhasil di inputkan
  </div>
</div>
<?php } ?>

<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4>Detail Gaji </h4>
    </div>
    <div class="card-body" id="laporan">
      <!-- <div class="card-content">
        <div class="row">
          <div class="col-6">
            <h5>Nama : </h5>
            <h5>jabatan : </h5>
            <h5>Badge No : </h5>
          </div>
          <div class="col-6">
            <div class="d-flex justify-content-end">
              <h5><?php echo $gaji['karyawan_nama'] ?></h5>
              <h5><?php echo $gaji['jabatan_nama'] ?></h5>
              <h5><?php echo $gaji['karyawan_nik'] ?></h5>
            </div>
          </div>
        </div>
      </div> -->
      <table>
          <tr>
            <td>Nama </td>
            <td> : </td>
            <td><?php echo $gaji['karyawan_nama'] ?></td>
          </tr>
          <tr>
            <td>Jabatan </td>
            <td> : </td>
            <td><?php echo $gaji['jabatan_nama'] ?></td>
          </tr>
          <tr>
            <td>Badge No. </td>
            <td> : </td>
            <td><?php echo $gaji['karyawan_nik'] ?></td>
          </tr>
          <tr>
            <td>Section </td>
            <td> : </td>
            <td></td>
          </tr>
          <tr>
            <td>Basic/ Day </td>
            <td> : </td>
            <td><?php echo $gaji['jabatan_basic'] ?></td>
          </tr>
          <tr>
            <td>Basic Meal Allowance / Day (Rp) </td>
            <td> : </td>
            <td><?php echo $gaji['jabatan_uang_makan'] ?></td>
          </tr>
          <tr>
            <td>Basic Over Time/ Hours (Rp) </td>
            <td> : </td>
            <td><?php echo $gaji['jabatan_lembur'] ?></td>
          </tr>
          <tr>
            <td>Menggunakan BPJS </td>
            <td> : </td>
            <td><?php echo $gaji['karyawan_bpjs'] ?></td>
          </tr>
          <tr>
            <td>Jaminan Kesehatan </td>
            <td> : </td>
            <td><?php echo $potong['potongan_jamsostek_kesehatan'] ?></td>
          </tr>
          <tr>
            <td>Jaminan Ketenagakerjaan </td>
            <td> : </td>
            <td><?php echo $potong['potongan_jamsostek_kerja'] ?></td>
          </tr>
          <tr>
            <td>Dana Pensiun </td>
            <td> : </td>
            <td><?php echo $potong['potongan_dana_pensiun'] ?></td>
          </tr>
          <tr>
            <td>Pinjaman </td>
            <td> : </td>
            <td><?php echo $potong['potongan_pinjaman'] ?></td>
          </tr>
          <tr>
            <td>Rapel </td>
            <td> : </td>
            <td><?php echo $potong['potongan_rapel'] ?></td>
          </tr>
      </table>
      <hr>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
      <?php if ($ubahPotong == null): ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">Tambah Potongan</button>
      <?php else: ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2<?php echo $ubahPotong['potongan_id'];?>">Edit Potongan</button>
      <?php endif; ?>
        <button type="button" name="button" class="btn btn-success" onclick="tabletoExcel('laporan', 'laporan gaji karyawan')">cetak laporan</button><hr>
      <div class="table-responsive">
        <table class="table table-striped" id="table-1" width="100%">
          <thead>
            <tr>
              <th rowspan="2">Schedule</th>
              <th rowspan="2">Basic</th>
              <th rowspan="2">Uang Hadir</th>
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
            <?php
            $uangHadir = 0;
            $totalBasic = 0;
            $totalMeal = 0;
            $totalLembur = 0;

            if ($detail != null): ?>
              <?php
              foreach ($detail as $key => $value): ?>
                <tr>
                  <td><?php echo longdate_indo($value['detail_tanggal']) ?></td>
                  <td><?php echo $value['detail_basic'] ?></td>
                  <td><?php echo $value['detail_uang_hadir'] ?></td>
                  <td><?php echo $value['detail_uang_makan'] ?></td>
                  <td></td>
                  <td><?php echo $value['detail_jam_keluar'] ?></td>
                  <td><?php echo $value['detail_non_stop'] ?></td>
                  <td><?php echo $value['detail_jam_lembur'] ?></td>
                  <td><?php echo $value['detail_jam_basic'] ?></td>
                  <td><?php echo $value['detail_lembur'] ?></td>
                  <td><?php echo $value['detail_lembur_1_5'] ?></td>
                  <td><?php echo $value['detail_lembur_2'] ?></td>
                  <td><?php echo $value['detail_total_lembur'] ?></td>
                </tr>
              <?php
              $uangHadir = $uangHadir + $value['detail_uang_hadir'];
              $totalhadir = $uangHadir * 15000;
              $totalBasic = $totalBasic + $value['detail_basic'];
              $totalMeal = $totalMeal + $value['detail_uang_makan'];
              $totalLembur = $totalLembur + $value['detail_total_lembur'];
              $hasilBasic = $totalBasic * $gaji['jabatan_basic'];
              $hasilMeal = $totalMeal * $gaji['jabatan_uang_makan'];
              $hasilTotal = $totalLembur * $gaji['jabatan_lembur'];
              $gajiSeluruh = $hasilBasic + $hasilMeal + $hasilTotal + $totalhadir;
              $jamSostek = $potong['potongan_jamsostek_kesehatan'] + $potong['potongan_jamsostek_kerja'] + $potong['potongan_dana_pensiun'];
              $totalPotong = $jamSostek + $potong['potongan_pinjaman'] + $potong['potongan_rapel'];
              $totalAB = $gajiSeluruh - $totalPotong;
            endforeach; ?>
            <?php endif; ?>
          </tbody>
          <tr style="margin-bottom:10px;border:1px;">
            <td class="text-center">Total</td>
            <td><?php echo $totalBasic; ?> </td>
            <td><?php echo $uangHadir; ?></td>
            <td><?php echo $totalMeal; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $totalLembur; ?></td>
          </tr>
          <table style="color:black;">
            <tr>
              <td>CALCULATION</td>
            </tr>
            <tr>
              <td colspan="3">1. total basic </td>
              <td><?php echo $totalBasic; ?> x <?php echo $gaji['jabatan_basic'] ?></td>
              <td> = </td>
              <td>Rp <?php echo $hasilBasic ?></td>
            </tr>
            <tr>
              <td colspan="3">2. total hadir </td>
              <td><?php echo $uangHadir; ?> x <?php echo 15000 ?></td>
              <td> = </td>
              <td>Rp <?php echo $totalhadir ?></td>
            </tr>
            <tr>
              <td colspan="3">3. total meal </td>
              <td><?php echo $totalMeal; ?> x <?php echo $gaji['jabatan_uang_makan'] ?></td>
              <td> = </td>
              <td>Rp <?php echo $hasilMeal ?></td>
            </tr>
            <tr>
              <td colspan="3">4. total lembur </td>
              <td><?php echo $totalLembur ?> x <?php echo $gaji['jabatan_lembur'] ?></td>
              <td> = </td>
              <td> Rp <?php echo $hasilTotal ?></td>
            </tr>
            <tr>
              <td colspan="3">5. Rapel </td>
              <td><?php echo $potong['potongan_rapel'] ?></td>
              <td> = </td>
              <td> Rp <?php echo $potong['potongan_rapel'] ?></td>
            </tr>
            <tr>
              <td colspan="6">Total (A)  </td>
              <td>Rp <?php echo $gajiSeluruh; ?></td>
            </tr>
            <tr>
              <td>B POTONGAN</td>
            </tr>
            <tr>
              <td colspan="5">Program Jamsostek</td>
              <td><?php echo $jamSostek ?></td>
            </tr>
            <tr>
              <td colspan="5">Pinjaman</td>
              <td><?php echo $potong['potongan_pinjaman'] ?></td>
            </tr>
            <tr>
              <td colspan="5">Rapel</td>
              <td><?php echo $potong['potongan_rapel'] ?></td>
            </tr>
            <tr>
              <td colspan="6">Total (B) </td>
              <td>Rp <?php echo $totalPotong ?></td>
            </tr>
            <tr>
              <td colspan="6"> total take home pay = (total A - total B)</td>
              <td>Rp <?php echo $totalAB; ?></td>
            </tr>
          </table>
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
            <form class="needs-validation" novalidate="" action="<?php echo base_url('contract/tambah/'.$id) ?>" method="post">
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

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="formModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="formModal">Input Potongan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="needs-validation" novalidate="" action="<?php echo base_url('contract/potongan/'.$id) ?>" method="post">
              <div class="form-group">
                <label>Kesehatan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar"></i>
                    </div>
                  </div>
                  <input type="number" class="form-control" placeholder="" name="kesehatan">
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ketenaga kerjaan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <input type="number" name="ketenagakerjaan" class="form-control">
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Dana Pensiun</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <input type="number" name="danapensiun" class="form-control">
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Pinjaman</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <input type="number" name="pinjaman" class="form-control">
                  <div class="invalid-feedback">
                    Field tidak boleh kosong
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Rapel</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-outdent"></i>
                    </div>
                  </div>
                  <input type="number" name="rapel" class="form-control">
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

        <div class="modal fade" id="exampleModal2<?php echo $ubahPotong['potongan_id'];?>" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formModal">Input Potongan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" novalidate="" action="<?php echo base_url('contract/ubahPot/'.$id) ?>" method="post">
                    <div class="form-group">
                      <label>Kesehatan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="number" class="form-control" placeholder="" name="kesehatan" value="<?php echo $ubahPotong['potongan_jamsostek_kesehatan'] ?>">
                        <div class="invalid-feedback">
                          Field tidak boleh kosong
                        </div>
                      </div>
                    </div>

                    <input type="hidden" name="potongId" value="<?php echo $ubahPotong['potongan_id'] ?>">

                    <div class="form-group">
                      <label>Ketenaga kerjaan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-outdent"></i>
                          </div>
                        </div>
                        <input type="number" name="ketenagakerjaan" class="form-control" value="<?php echo $ubahPotong['potongan_jamsostek_kerja'] ?>">
                        <div class="invalid-feedback">
                          Field tidak boleh kosong
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Dana Pensiun</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-outdent"></i>
                          </div>
                        </div>
                        <input type="number" name="danapensiun" class="form-control" value="<?php echo $ubahPotong['potongan_dana_pensiun'] ?>">
                        <div class="invalid-feedback">
                          Field tidak boleh kosong
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pinjaman</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-outdent"></i>
                          </div>
                        </div>
                        <input type="number" name="pinjaman" class="form-control" value="<?php echo $ubahPotong['potongan_pinjaman'] ?>">
                        <div class="invalid-feedback">
                          Field tidak boleh kosong
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Rapel</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-outdent"></i>
                          </div>
                        </div>
                        <input type="number" name="rapel" class="form-control" value="<?php echo $ubahPotong['potongan_rapel'] ?>">
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

            <script type="text/javascript">
                function tabletoExcel(table, name) {
                    var uri = 'data:application/vnd.ms-excel;base64,'
                          , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                          , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))); }
                          , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }); };
                        if (!table.nodeType) table = document.getElementById(table);
                        var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML };
                        window.location.href = uri + base64(format(template, ctx));

                }

            </script>
