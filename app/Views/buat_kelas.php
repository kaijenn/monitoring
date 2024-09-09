<!DOCTYPE html>
<html>
<head>
    <title>Buat Kelas</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const posisiKelasSelect = document.getElementById('posisikelas');
            
            const kelasFields = document.getElementById('kelasFields');
            const labKomputerFields = document.getElementById('labKomputerFields');
            const labIPAFields = document.getElementById('labIPAFields');

            function showFields() {
                const selectedValue = posisiKelasSelect.value;

                // Sembunyikan semua field terlebih dahulu
                kelasFields.style.display = 'none';
                labKomputerFields.style.display = 'none';
                labIPAFields.style.display = 'none';

                // Tampilkan field sesuai dengan pilihan
                if (selectedValue === 'Kelas') {
                    kelasFields.style.display = 'block';
                } else if (selectedValue === 'Lab Komputer') {
                    kelasFields.style.display = 'block';
                    labKomputerFields.style.display = 'block';
                } else if (selectedValue === 'Lab IPA') {
                    kelasFields.style.display = 'block';
                    labIPAFields.style.display = 'block';
                }
            }

            // Tambahkan event listener untuk menangani perubahan dropdown
            posisiKelasSelect.addEventListener('change', showFields);

            // Tampilkan field awal berdasarkan nilai default
            showFields();
        });
    </script>
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Buat Kelas</h4>
                            <form action="<?= base_url('home/aksi_t_kelas') ?>" method="POST">
                                <input type="hidden" name="id" value="">

                                <!-- Menampilkan nama kelas dan posisi kelas -->
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Kelas</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" name="namakelas" >
                                </div>
                                <div class="form-group">
                                    <label for="posisikelas">Posisi Kelas</label>
                                    <select class="form-control" id="posisikelas" name="posisikelas" required>
                                        <option value="Kelas">Kelas</option>
                                        <option value="Lab Komputer">Lab Komputer</option>
                                        <option value="Lab IPA">Lab IPA</option>
                                    </select>
                                </div>

                                <!-- Form untuk jumlah meja dan kursi -->
                                <div id="kelasFields">
                                    <div class="form-group">
                                        <label for="jumlahMeja">Jumlah Meja</label>
                                        <input type="text" class="form-control" id="jumlahMeja" placeholder="Masukkan Jumlah Meja" name="jumlahmeja" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahKursi">Jumlah Kursi</label>
                                        <input type="text" class="form-control" id="jumlahKursi" placeholder="Masukkan Jumlah Kursi" name="jumlahkursi" >
                                    </div>
                                </div>

                                <!-- Form khusus untuk Lab Komputer -->
                                <div id="labKomputerFields" style="display:none;">
                                    <div class="form-group">
                                        <label for="jumlahMonitor">Jumlah Monitor</label>
                                        <input type="text" class="form-control" id="jumlahMonitor" placeholder="Masukkan Jumlah Monitor" name="jumlahmonitor" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahCPU">Jumlah CPU</label>
                                        <input type="text" class="form-control" id="jumlahCPU" placeholder="Masukkan Jumlah CPU" name="jumlahcpu" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahMouse">Jumlah Mouse</label>
                                        <input type="text" class="form-control" id="jumlahMouse" placeholder="Masukkan Jumlah Mouse" name="jumlahmouse" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahKeyboard">Jumlah Keyboard</label>
                                        <input type="text" class="form-control" id="jumlahKeyboard" placeholder="Masukkan Jumlah Keyboard" name="jumlahkeyboard" >
                                    </div>
                                </div>

                                <!-- Form khusus untuk Lab IPA -->
                                <div id="labIPAFields" style="display:none;">
                                    <div class="form-group">
                                        <label for="jumlahMikroskop">Jumlah Mikroskop</label>
                                        <input type="text" class="form-control" id="jumlahMikroskop" placeholder="Masukkan Jumlah Mikroskop" name="jumlahmikroskop" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahBurette">Jumlah Burette</label>
                                        <input type="text" class="form-control" id="jumlahBurette" placeholder="Masukkan Jumlah Burette" name="jumlahburette" >
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahRangkaManusia">Jumlah Rangka Manusia</label>
                                        <input type="text" class="form-control" id="jumlahRangkaManusia" placeholder="Masukkan Jumlah Rangka Manusia" name="jumlahrangkamanusia" >
                                    </div>
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
</body>
</html>
