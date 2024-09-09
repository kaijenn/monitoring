<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Kelas</h4>
                        <form action="<?= base_url('home/aksi_t_user') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $yoga->id_user ?>">

                            <!-- Menampilkan nama kelas dan posisi kelas -->
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama User</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="username"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="password"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input type="email" class="form-control" id="exampleInputUsername1" name="email"  >
                            </div>
                            <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        <option value="admin" <?= $yoga->status == "admin" ? 'selected' : '' ?>>Admin</option>
        <option value="admin_ruangan" <?= $yoga->status == "admin_ruangan" ? 'selected' : '' ?>>Admin Ruangan</option>
        <option value="user" <?= $yoga->status == "user" ? 'selected' : '' ?>>User</option>
    </select>
</div>



                            <!-- Form untuk jumlah meja dan kursi -->
                            <div class="form-group">
                                <label for="jumlahMeja">NIS</label>
                                <input type="text" class="form-control" id="jumlahMeja" name="nis"  >
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
