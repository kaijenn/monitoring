<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User</h4>
                  <div class="table-responsive">
                  <a class="nav-link text-Headings my-2" href="<?= base_url('home/tambah_user')?>">
                    <span class="mdi mdi-account-plus"></span>
                </a>
                    <table class="table">
                      <thead>
                      <tr>
              <th>No</th>
              <th>Nama Kelas</th>
              <th>Status</th>
              <th>NIS</th>
              <th>Action</th>
            </tr>
                      </thead>
                      <tbody>
                      <?php
            $no = 1;
            foreach ($yoga as $key) {
            ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key->username ?></td>
                        <td><?= $key->status ?></td>
                        <td><?= $key->nis ?></td>

                        <td>
                  <a href="<?= base_url('home/e_user/' . $key->id_user) ?>">
                    <button class="btn btn-warning">
                      <i class="now-ui-icons ui-1_check"></i> Edit
                    </button>
                  </a>
                  <a href="<?= base_url('home/izin_kelas/' . $key->id_user) ?>">
                    <button class="btn btn-warning">
                      <i class="now-ui-icons ui-1_check"></i> Delete
                    </button>
                  </a>
                  <a href="<?= base_url('home/resetpassword/' . $key->id_user) ?>" onclick="return confirm('Apakah Anda yakin ingin mereset password?');">
                    <button class="btn btn-danger">
                      <i class="now-ui-icons ui-1_check"></i> Reset Password
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