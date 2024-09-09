<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kelas</h4>
                        <a class="nav-link text-Headings my-2" href="<?= base_url('home/buat_kelas') ?>">
    <span class="btn btn-info">Tambah Kelas</span>
</a>

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
                                    foreach ($all_classes as $key) { // Menggunakan variabel $all_classes
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key->nama_kelas ?></td>
                                            <td><?= $key->posisi_kelas ?></td>
                                            <td><?= $key->status ?></td>
                                            <td>
                                               
                                        
                                            <a href="<?= base_url('home/e_kelas/' . $key->id_user) ?>">
                                                    <button class="btn btn-primary">
                                                        <i class="now-ui-icons ui-1_check"></i> Edit
                                                    </button>
                                                </a>
                                                <a href="<?= base_url('home/hapus_kelas/' . $key->id_kelas) ?>">
                                                    <button class="btn btn-danger">
                                                        <i class="now-ui-icons ui-1_check"></i> Delete
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel kedua untuk izin kelas -->
        <div class="row mt-4">
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengguna dengan Izin Kelas</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Waktu Awal</th>
                                <th>Waktu Akhir</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (!empty($yoga)) { // Menggunakan variabel $yoga yang difilter
                                foreach ($yoga as $kelas) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kelas->username ?></td> <!-- Bisa diganti dengan nama peminjam jika di-join -->
                                        <td><?= $kelas->waktu_awal ?></td>
                                        <td><?= $kelas->waktu_akhir ?></td>
                                        <td><?= $kelas->keperluan ?></td>
                                        <td><?= $kelas->kelasstatus ?></td>
                                        <td>
                                            <a href="<?= base_url('home/edit_karyawan/' . $kelas->id_user) ?>">
                                                <button class="btn btn-info">
                                                    <i class="now-ui-icons ui-1_check"></i> Detail
                                                </button>
                                            </a>
                                            <a href="<?= base_url('home/izinkan_kelas/' . $kelas->id_kelas) ?>">
                                                <button class="btn btn-success">
                                                    <i class="now-ui-icons ui-1_check"></i> Izinkan
                                                </button>
                                            </a>
                                            <a href="<?= base_url('home/tolak_kelas/' . $kelas->id_user) ?>">
                                                <button class="btn btn-danger">
                                                    <i class="now-ui-icons ui-1_check"></i> Tolak
                                                </button>
                                            </a>
                                            <a href="<?= base_url('home/selesai_kelas/' . $kelas->id_kelas) ?>">
                                                <button class="btn btn-primary">
                                                    <i class="now-ui-icons ui-1_check"></i> Selesai
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } 
                            } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data izin kelas yang tersedia.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
