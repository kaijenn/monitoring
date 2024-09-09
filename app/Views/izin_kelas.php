<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Izin Kelas</h4>
                        <form action="<?= base_url('home/aksi_izin_kelas') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $dua->id_kelas ?>">

                            <!-- Menampilkan nama kelas dan posisi kelas -->
                            <div class="form-group">
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
                            <?php endif; ?>

                            <!-- Form yang sama untuk kedua jenis kelas -->
                            <div class="form-group">
                                <label for="username">Nama Peminjam</label>
                                <input type="text" class="form-control" id="username" value="<?= session()->get('username') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="waktuAwal">Waktu Awal</label>
                                <input type="time" class="form-control" id="waktuAwal" name="waktuawal">
                            </div>
                            <div class="form-group">
                                <label for="waktuAkhir">Waktu Akhir</label>
                                <input type="time" class="form-control" id="waktuAkhir" name="waktuakhir">
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Keperluan</label>
                                <textarea class="form-control" id="keperluan" rows="2" name="keperluan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
