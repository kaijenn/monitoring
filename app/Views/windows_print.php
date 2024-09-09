<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kelas</title>
    <link rel="stylesheet" href="path/to/your/css/file.css"> <!-- ganti dengan path CSS Anda -->
    <style>
        .report-header, .report-footer {
            text-align: center;
            margin: 20px 0;
        }
        .report-title {
            font-size: 24px;
            font-weight: bold;
        }
        .report-date {
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
     <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<div class="report-header">
    <div class="report-title">Laporan Kelas</div>
    <div class="report-date">Tanggal Cetak: <?= date('d-m-Y') ?></div>
</div>

<table class="table" id="notaTable">
    <thead>
        <tr>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Posisi Kelas</th>
            <th scope="col">Waktu Awal</th>
            <th scope="col">Waktu Akhir</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Tanggal</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    if (isset($kelas) && is_array($kelas)) { // Gunakan $kelas dari $data['kelas']
        foreach ($kelas as $key) { ?>
            <tr>
                <td><?= esc($key->penanggung_username) ?></td>
                <td><?= esc($key->nama_kelas) ?></td>
                <td><?= esc($key->posisi_kelas) ?></td>
                <td><?= esc($key->waktu_awal) ?></td>
                <td><?= esc($key->waktu_akhir) ?></td>
                <td><?= esc($key->keperluan) ?></td>
                <td><?= esc($key->kondisi) ?></td>
                <td><?= esc($key->tanggal) ?></td>
            </tr>
        <?php } 
    } else { ?>
        <tr>
            <td colspan="8">Data tidak ditemukan.</td>
        </tr>
    <?php } ?>
</tbody>

</table>
<button class="print-button" onclick="printReport()">Print</button>
</body>
</html>
