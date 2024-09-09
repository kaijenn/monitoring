<div class="main-panel">
<div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Restore Edit</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kelas</th>
                                        <th>Posisi Kelas</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($yoga as $key) { // Menggunakan variabel $all_classes
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key->nama_kelas ?></td>
                                            <td><?= $key->posisi_kelas ?></td>
                                            <td><?= $key->status ?></td>
                                            <td>
                                               
                                        
                                            <td>
    <button class="btn btn-info" data-toggle="modal" data-target="#editPaketModal"
        onclick="editKelas('<?= $key->id_kelas ?>', '<?= $key->nama_kelas ?>', '<?= $key->posisi_kelas ?>', '<?= $key->status ?>', '<?= $key->jumlah_meja ?>', '<?= $key->jumlah_kursi ?>', '<?= $key->jumlah_monitor ?>', '<?= $key->jumlah_cpu ?>', '<?= $key->jumlah_mouse ?>', '<?= $key->jumlah_keyboard ?>', '<?= $key->jumlah_mikroskop ?>', '<?= $key->jumlah_burette ?>', '<?= $key->jumlah_rangka_manusia ?>')">
        <i class="now-ui-icons ui-1_check"></i> Detail
    </button>
    <a href="<?= base_url('home/restore_data_edit/' . $key->id_kelas) ?>">
                                                <button class="btn btn-primary">
                                                    <i class="now-ui-icons ui-1_check"></i> Restore
                                                </button>
                                            </a>

</td>

                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>


      <div class="modal fade" id="editPaketModal" tabindex="5" role="dialog" aria-labelledby="editPaketModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaketModalLabel">Detail Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div id="editPaketForm" action="<?= base_url('home/aksi_e_paket') ?>" method="post">
      <div class="form-group">
      <input type="hidden" id="id_kelas" name="id_kelas">
                                <label for="exampleInputUsername1">Nama Kelas</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="namakelas" value="<?= $dua->nama_kelas ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Posisi Kelas</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="posisikelas" value="<?= $dua->posisi_kelas ?>" readonly>
                            </div>

                            <!-- Form untuk jumlah meja dan kursi -->
                            <div class="form-group">
                                <label for="jumlahMeja">Jumlah Meja</label>
                                <input type="text" class="form-control" id="jumlahMeja" placeholder="Masukkan Jumlah Meja" name="jumlahmeja" value="<?= $dua->jumlah_meja ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlahKursi">Jumlah Kursi</label>
                                <input type="text" class="form-control" id="jumlahKursi" placeholder="Masukkan Jumlah Kursi" name="jumlahkursi" value="<?= $dua->jumlah_kursi ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Status" readonly>
                            </div>


                            <!-- Form khusus untuk Lab Komputer -->
                            <?php if ($dua->jenis_kelas == 'Lab Komputer'): ?>
                                <div class="form-group">
                                    <label for="jumlahMonitor">Jumlah Monitor</label>
                                    <input type="text" class="form-control" id="jumlahMonitor" placeholder="Masukkan Jumlah Monitor" name="jumlahmonitor" value="<?= $dua->jumlah_monitor ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahCPU">Jumlah CPU</label>
                                    <input type="text" class="form-control" id="jumlahCPU" placeholder="Masukkan Jumlah CPU" name="jumlahcpu" value="<?= $dua->jumlah_cpu ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahMouse">Jumlah Mouse</label>
                                    <input type="text" class="form-control" id="jumlahMouse" placeholder="Masukkan Jumlah Mouse" name="jumlahmouse" value="<?= $dua->jumlah_mouse ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahKeyboard">Jumlah Keyboard</label>
                                    <input type="text" class="form-control" id="jumlahKeyboard" placeholder="Masukkan Jumlah Keyboard" name="jumlahkeyboard" value="<?= $dua->jumlah_keyboard ?>" readonly>
                                </div>

                            <!-- Form khusus untuk Lab IPA -->
                            <?php elseif ($dua->jenis_kelas == 'Lab IPA'): ?>
                                <div class="form-group">
                                    <label for="jumlahMikroskop">Jumlah Mikroskop</label>
                                    <input type="text" class="form-control" id="jumlahMikroskop" placeholder="Masukkan Jumlah Mikroskop" name="jumlahmikroskop" value="<?= $dua->jumlah_mikroskop ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahBurette">Jumlah Burette</label>
                                    <input type="text" class="form-control" id="jumlahBurette" placeholder="Masukkan Jumlah Burette" name="jumlahburette" value="<?= $dua->jumlah_burette ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahRangkaManusia">Jumlah Rangka Manusia</label>
                                    <input type="text" class="form-control" id="jumlahRangkaManusia" placeholder="Masukkan Jumlah Rangka Manusia" name="jumlahrangkamanusia" value="<?= $dua->jumlah_rangka_manusia ?>" readonly>
                                </div>
                            </div>
                            <?php endif; ?>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?= base_url('https://code.jquery.com/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') ?>"></script>



<script>
  function editKelas(id, namaKelas, posisiKelas, status, jumlahMeja, jumlahKursi, jumlahMonitor, jumlahCPU, jumlahMouse, jumlahKeyboard, jumlahMikroskop, jumlahBurette, jumlahRangkaManusia) {
    // Populate the form fields in the modal
    document.getElementById('id_kelas').value = id;
    document.getElementById('exampleInputUsername1').value = namaKelas;
    document.getElementById('exampleInputEmail1').value = posisiKelas;
    document.getElementById('jumlahMeja').value = jumlahMeja;
    document.getElementById('jumlahKursi').value = jumlahKursi;
    document.getElementById('status').value = status;

    // Show or hide fields based on type of lab
    if (jumlahMonitor) {
        document.getElementById('jumlahMonitor').value = jumlahMonitor;
        document.getElementById('jumlahCPU').value = jumlahCPU;
        document.getElementById('jumlahMouse').value = jumlahMouse;
        document.getElementById('jumlahKeyboard').value = jumlahKeyboard;
    } else {
        // Hide fields if not present
        document.getElementById('jumlahMonitor').value = '';
        document.getElementById('jumlahCPU').value = '';
        document.getElementById('jumlahMouse').value = '';
        document.getElementById('jumlahKeyboard').value = '';
    }

    if (jumlahMikroskop) {
        document.getElementById('jumlahMikroskop').value = jumlahMikroskop;
        document.getElementById('jumlahBurette').value = jumlahBurette;
        document.getElementById('jumlahRangkaManusia').value = jumlahRangkaManusia;
    } else {
        // Hide fields if not present
        document.getElementById('jumlahMikroskop').value = '';
        document.getElementById('jumlahBurette').value = '';
        document.getElementById('jumlahRangkaManusia').value = '';
    }
}

</script>

