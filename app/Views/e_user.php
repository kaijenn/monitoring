<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Kelas</h4>
                        <form action="<?= base_url('home/aksi_e_user') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $yoga->id_user ?>">

                            <!-- Menampilkan nama kelas dan posisi kelas -->
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama User</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="username" value="<?= $yoga->username ?>" >
                            </div>
                            <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <!-- Option values -->
        <option value="Admin" <?= $dua->status == "admin" ? 'selected' : '' ?>>Admin</option>
        <option value="Admin Ruangan" <?= $dua->status == "admin_ruangan" ? 'selected' : '' ?>>Admin Ruangan</option>
        <option value="User" <?= $dua->status == "user" ? 'selected' : '' ?>>User</option>
    </select>
</div>

                            <!-- Form untuk jumlah meja dan kursi -->
                            <div class="form-group">
                                <label for="jumlahMeja">NIS</label>
                                <input type="text" class="form-control" id="jumlahMeja" name="nis" value="<?= $yoga->nis ?>" >
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
