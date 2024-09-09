<div class="col-md-5 grid-margin ">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pengaturan Hak Akses </h4>
            <form action="<?= base_url('home/update_hak_akses/' . $level) ?>" method="post">
                <label>
                    <input type="checkbox" name="permissions[]" value="dashboard"
                        <?= in_array('dashboard', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Dashboard
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="kelas"
                        <?= in_array('kelas', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Kelas
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="kelas_admin"
                        <?= in_array('kelas_admin', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Kelas
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="restore"
                        <?= in_array('restore', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Restore
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="restore_edit"
                        <?= in_array('restore_edit', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Restore Edit
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="laporan"
                        <?= in_array('laporan', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Laporan
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="setting"
                        <?= in_array('setting', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                   Setting
                </label>
                <br>
                <label>
                    <input type="checkbox" name="permissions[]" value="log_activiity"
                        <?= in_array('log_activiity', array_column($permissions, 'menu_name')) ? 'checked' : '' ?>>
                    Log Activity
                </label>
                <button type="submit" class="btn btn-primary">Simpan Hak Akses</button>
            </form>


        </div>
    </div>