<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Izin Kelas</h4>
                        <form action="<?= base_url('home/aksi_e_kelas') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $dua->id_kelas ?>">

                            <!-- Menampilkan nama kelas dan posisi kelas -->
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Kelas</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="namakelas" value="<?= $dua->nama_kelas ?>" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Posisi Kelas</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="posisikelas" value="<?= $dua->posisi_kelas ?>" >
                            </div>

                            <!-- Form untuk jumlah meja dan kursi -->
                            <div class="form-group">
                                <label for="jumlahMeja">Jumlah Meja</label>
                                <input type="text" class="form-control" id="jumlahMeja" placeholder="Masukkan Jumlah Meja" name="jumlahmeja" value="<?= $dua->jumlah_meja ?>" >
                            </div>
                            <div class="form-group">
                                <label for="jumlahKursi">Jumlah Kursi</label>
                                <input type="text" class="form-control" id="jumlahKursi" placeholder="Masukkan Jumlah Kursi" name="jumlahkursi" value="<?= $dua->jumlah_kursi ?>" >
                            </div>
                            

                            <!-- Form khusus untuk Lab Komputer -->
                            <?php if ($dua->jenis_kelas == 'Lab Komputer'): ?>
                                <div class="form-group">
                                    <label for="jumlahMonitor">Jumlah Monitor</label>
                                    <input type="text" class="form-control" id="jumlahMonitor" placeholder="Masukkan Jumlah Monitor" name="jumlahmonitor" value="<?= $dua->jumlah_monitor ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlahCPU">Jumlah CPU</label>
                                    <input type="text" class="form-control" id="jumlahCPU" placeholder="Masukkan Jumlah CPU" name="jumlahcpu" value="<?= $dua->jumlah_cpu ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlahMouse">Jumlah Mouse</label>
                                    <input type="text" class="form-control" id="jumlahMouse" placeholder="Masukkan Jumlah Mouse" name="jumlahmouse" value="<?= $dua->jumlah_mouse ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlahKeyboard">Jumlah Keyboard</label>
                                    <input type="text" class="form-control" id="jumlahKeyboard" placeholder="Masukkan Jumlah Keyboard" name="jumlahkeyboard" value="<?= $dua->jumlah_keyboard ?>" >
                                </div>

                            <!-- Form khusus untuk Lab IPA -->
                            <?php elseif ($dua->jenis_kelas == 'Lab IPA'): ?>
                                <div class="form-group">
                                    <label for="jumlahMikroskop">Jumlah Mikroskop</label>
                                    <input type="text" class="form-control" id="jumlahMikroskop" placeholder="Masukkan Jumlah Mikroskop" name="jumlahmikroskop" value="<?= $dua->jumlah_mikroskop ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlahBurette">Jumlah Burette</label>
                                    <input type="text" class="form-control" id="jumlahBurette" placeholder="Masukkan Jumlah Burette" name="jumlahburette" value="<?= $dua->jumlah_burette ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="jumlahRangkaManusia">Jumlah Rangka Manusia</label>
                                    <input type="text" class="form-control" id="jumlahRangkaManusia" placeholder="Masukkan Jumlah Rangka Manusia" name="jumlahrangkamanusia" value="<?= $dua->jumlah_rangka_manusia ?>" >
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <!-- Option values -->
        <option value="Sedang di Pakai" <?= $dua->status == "Sedang di Pakai" ? 'selected' : '' ?>>Sedang di Pakai</option>
        <option value="Pending" <?= $dua->status == "Pending" ? 'selected' : '' ?>>Pending</option>
        <option value="Kosong" <?= $dua->status == "Kosong" ? 'selected' : '' ?>>Kosong</option>
    </select>
</div>


                            <!-- Form yang sama untuk kedua jenis kelas -->
                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
