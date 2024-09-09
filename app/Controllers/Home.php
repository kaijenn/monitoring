<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\M_projek;
use Dompdf\Dompdf;
use App\Models\UserActivityModel;
use App\Models\PermissionModel;
use CodeIgniter\HTTP\UserAgent;
use TCPDF\TCPDF;
use App\Models\LevelPermissionModel;


class Home extends BaseController
{
    protected $userActivityModel;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->userActivityModel = new UserActivityModel();
    }
   
    public function dashboard()
    {
        if (session()->get('id') > 0) {
            helper('permission'); // Pastikan helper dimuat

            // Cek apakah user memiliki hak akses untuk 'pemesanan'
            // Asumsikan ada logika cek akses disini

            $session = session();
            
            // Ambil nama pengguna dari session
            $data['username'] = $session->get('username');
            
            // Ambil data setting
            $model = new M_projek();
            $where3 = array('id_setting' => '1');
            $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
            $data['jumlahKelasKosong'] = $model->countKelasKosong();
            $data['jumlahKelasPenuh'] = $model->countKelasPenuh();
            $data['jumlahKelas'] = $model->countKelas();

            // Kirim data ke view
            echo view('header', $data);
            echo view('menu');
            echo view('dashboard', $data); // Pastikan view dashboard menerima data
            echo view('footer');
        } else {
            return redirect()->to('home/login');
        }
    }

    function tanggal_indo($date)
{
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $date);
    
    // Contoh: 2021-01-10 akan menjadi 10 Januari 2021
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

public function login()
	{

        $model = new M_projek;
        
        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'menu' => 'Masuk ke Menu Login',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        
        
		echo view ('header',$data);
		echo view('login');
		
	}
	public function aksi_login()
{
    $yo = $this->request->getPost('username');
    $ga = $this->request->getPost('password');

    $captcha_response = $this->request->getPost('g-recaptcha-response');
        $backup_captcha = $this->request->getPost('backup_captcha');

        if (empty($captcha_response) && empty($backup_captcha)) {
            return redirect()->to('home/login')->with('error', 'CAPTCHA is required.');
        }

        // Validate reCAPTCHA
        if (!empty($captcha_response)) {
            $secret_key = '6Le2zTAqAAAAAP9soSvo-5sAmuZ5dRaKKBzOc-42';
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha_response");
            $response_keys = json_decode($response, true);

            if (intval($response_keys["success"]) !== 1) {
                return redirect()->to('home/login')->with('error', 'reCAPTCHA validation failed.');
            }
        }

        // Validate offline CAPTCHA
        if (!empty($backup_captcha)) {
            // Validate the backup CAPTCHA here (e.g., by checking against a stored value or a generated value)
            // Assuming validateOfflineCaptcha is a method that verifies the backup CAPTCHA
            if (!$this->validateOfflineCaptcha($backup_captcha)) {
                return redirect()->to('home/login')->with('error', 'Offline CAPTCHA validation failed.');
            }
        }

    $where = array(
        'username' => $yo,
        'password' => md5($ga),
    );

    $model = new M_projek();
    $check = $model->getWhere('user', $where);
	if ($check > 0) {
        session()->set('username', $check->username);
        session()->set('id', $check->id_user);
        session()->set('status', $check->status);
        return redirect()->to('home/dashboard');
    } else {
        return redirect()->to('home/login');
    }
}

private function validateOfflineCaptcha($captchaInput)
    {
        // Ambil CAPTCHA yang disimpan di session
        $storedCaptcha = session()->get('captcha_code');

        // Bandingkan input pengguna dengan CAPTCHA yang disimpan (peka huruf besar/kecil)
        return $captchaInput === $storedCaptcha;
    }
    public function generateCaptcha()
    {
        $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

        // Store the CAPTCHA code in the session
        session()->set('captcha_code', $code);

        // Generate the image
        $image = imagecreatetruecolor(120, 40);
        $bgColor = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        imagefilledrectangle($image, 0, 0, 120, 40, $bgColor);
        imagestring($image, 5, 10, 10, $code, $textColor);

        // Set the content type header - in this case image/png
        header('Content-Type: image/png');

        // Output the image
        imagepng($image);

        // Free up memory
        imagedestroy($image);
    }


    public function logout()

    {
        session()->destroy();
        return redirect()->to('home/login');
    }



    public function profile()
    {
        if (session()->get('id') > 0) {

            $model = new M_projek;
            $where3 = array('id_setting' => '1');
            $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();

            $where = array('id_user' => session()->get('id'));
            $data['darren'] = $model->getwhere('user', $where);

            echo view('header', $data);
            echo view('menu', $data);
            echo view('profile', $data);
            echo view('footer');
        } else {
            return redirect()->to('home/login');
        }
    }



    public function editfoto()
    {
        $model = new M_projek();
        $userData = $model->getById(session()->get('id'));

        if ($this->request->getFile('foto')) {

            $file = $this->request->getFile('foto');
            $newFileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/img', $newFileName);

            if ($userData->foto && file_exists(ROOTPATH . 'public/img/' . $userData->foto)) {
                unlink(ROOTPATH . 'public/img/' . $userData->foto);
            }
            $userId = ['id_user' => session()->get('id')];
            $userData = ['foto' => $newFileName];
            $model->edit('user', $userData, $userId);
        }
        return redirect()->to('home/profile');
    }



    public function aksi_e_profile()
    {
        if (session()->get('id') > 0) {
            $model = new M_projek();
            $yoga = $this->request->getPost('username');
            $yoga1 = $this->request->getPost('email');
            $yoga2 = $this->request->getPost('phone');
            $id = $this->request->getPost('id');

            $where = array('id_user' => $id); // Jika id_user adalah kunci utama untuk menentukan record


            $isi = array(
                'username' => $yoga,
                'email' => $yoga1,
                'nohp' => $yoga2,
            );

            $model->edit('user', $isi, $where);
            return redirect()->to('home/profile');
            // print_r($yoga);
            // print_r($id);
        } else {
            return redirect()->to('home/login');
        }
    }



    public function user()
	{
        if (session()->get('id') > 0) {

            
          
		$model = new M_projek;
		$data['yoga'] = $model->tampil('user');
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();


        $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'menu' => 'Masuk ke User',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

		echo view ('header', $data);
		echo view ('menu');
		echo view('user', $data);
		echo view('footer');
   
} else {
    return redirect()->to('home/login');
}
	}


    public function tambah_user()
	{
		
		$model = new M_projek;
		$data['yoga'] = $model->tampil('user');
	
		echo view ('header');
		echo view ('menu');
		echo view('t_user', $data);
		echo view('footer');
		
	}
	public function aksi_t_user()
	{
		
		$yoga = $this -> request ->getPost('username');
        $cahya = $this -> request ->getPost('password');
        $cahya1 = $this -> request ->getPost('email');
		$cahya2 = $this -> request ->getPost('status');
        $cahya3 = $this -> request ->getPost('nis');
		
		$darren=array(
			'username'=>$yoga,
			'password'=>md5($cahya),
            'email'=>$cahya1,
            'status'=>$cahya2,
            'nis'=>$cahya3,
			
			
		);

		$model=new M_projek;
		$model->tambah('user',$darren);
		return redirect()->to('home/user');
		
	}


    public function resetpassword($id)
    {
        $model = new M_projek();
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();


        $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'menu' => 'Reset password',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
        $model->resetPassword($id);

        echo view('header', $data);

        return redirect()->to('home/user');
    }

    public function e_user($id)
    {
        $model = new M_projek;
        $data['satu'] = $model->getWhere1('kelas', array('id_user' => $id))->getRow();
        $where = array('id_user' => $id);
        $data['yoga']=$model->getWhere('user',$where);
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        // Ambil username dari tabel user
        $data['username'] = $model->getUsernameById($id); // Method baru di model
        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'menu' => 'Masuk ke Edit User',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
        echo view('header', $data);
        echo view('menu');
        echo view('e_user', $data);
        echo view('footer');
        // print_r($data['yoga']);
    }

    public function aksi_e_user()
	{
		if(session()->get('id')>0){
		$model = new M_projek();
		$yoga = $this -> request ->getPost('username');
		$cahya = $this -> request ->getPost('status');
        $cahya1 = $this -> request ->getPost('nis');
		$id = $this -> request ->getPost('id');

		$where = array('id_user'=>$id);

		$isi = array(

			'username'=>$yoga,
			'status'=>$cahya,
            'nis'=>$cahya1,
			
		);
		
		$model->edit('user', $isi, $where);

		return redirect()->to('home/user');
		}else{
		return redirect()->to('home/login');
		}

	}



    public function kelas()
	{
        if (session()->get('id') > 0) {

            
          
		$model = new M_projek;
		$data['yoga'] = $model->tampil('kelas');
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();


        $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'menu' => 'Masuk ke Kelas',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

		echo view ('header', $data);
		echo view ('menu');
		echo view('kelas', $data);
		echo view('footer');
   
} else {
    return redirect()->to('home/login');
}
	}


    public function izin_kelas($id)
    {
        $model = new M_projek;
        $where = array('kelas.id_user' => $id);
        $data['yoga'] = $model->joinKelasWithUser($where); // Ambil data kelas dengan username
        $data['dua'] = $model->getWhere1('kelas', array('id_user' => $id))->getRow();
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        // Ambil username dari tabel user
        $data['username'] = $model->getUsernameById($id); // Method baru di model

        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'menu' => 'Masuk ke Form Izin Kelas',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
    
        echo view('header', $data);
        echo view('menu');
        echo view('izin_kelas', $data);
        echo view('footer');
        // print_r($data['yoga']);
    }
    
    

    public function aksi_izin_kelas()
{
    // Mengambil data dari form
   
    $yoga9 = $this->request->getPost('waktuawal');
    $yoga10 = $this->request->getPost('waktuakhir');
    $yoga11 = $this->request->getPost('keperluan');
    $id = $this->request->getPost('id'); // ID Kelas

    // Menentukan kondisi untuk update data
    $where = ['id_kelas' => $id];

    // Mengambil data dari session untuk id_penanggung (misalnya, id pengguna yang sedang login)
    $idPenanggung = session()->get('id'); 

    // Membuat array data yang akan diupdate
    $oke = [
        'waktu_awal' => $yoga9,
        'waktu_akhir' => $yoga10,
        'keperluan' => $yoga11,
        'id_penanggung' => $idPenanggung, // Simpan ID pengguna yang sedang login
        'status' => 'Pending', // Set status menjadi Pending
        'tanggal' => date('Y-m-d H:i:s'),
    ];

    // Memanggil model untuk update data
    $model = new M_projek(); // Pastikan model ini sudah di-load
    $model->edit('kelas', $oke, $where); // Gunakan metode yang sesuai di model

    // Redirect ke halaman yang diinginkan setelah update berhasil
    return redirect()->to('home/kelas')->with('message', 'Data kelas berhasil diupdate.');
}
public function izinkan_kelas($id)
    {
        $model = new M_projek();
        $where = array('id_kelas' => $id);
        $array = array(
            'status' => 'Sedang di Pakai',
        );
        $model->edit('kelas', $array, $where);
        // print_r($array);
        return redirect()->to('Home/kelas_admin');
    }
    public function tolak_kelas($id)
    {
        $model = new M_projek();
        $where = array('id_kelas' => $id);
        $array = array(
            'status' => 'Ditolak',
        );
        $model->edit('kelas', $array, $where);
        // print_r($array);
        return redirect()->to('Home/kelas_admin');
    }
    public function kelas_admin()
    {

        if (session()->get('id') > 0) {
          
        $model = new M_projek;
        
        // Ambil semua data kelas untuk tabel pertama
        $whereAllClasses = array('id_user' => session()->get('id')); 
        $allClasses = $model->tampilWhere('kelas', $whereAllClasses);
        
        // Ambil hanya data kelas yang telah diisi untuk tabel kedua dengan join ke tabel user
        $whereFilledClasses = array('kelas.id_user' => session()->get('id')); 
        $filledClasses = $model->joinKelasWithUser1($whereFilledClasses);
        
        // Filter data agar hanya yang memiliki nilai pada id_penanggung, waktu_awal, waktu_akhir, dan keperluan yang ditampilkan
        $filteredData = array_filter($filledClasses, function ($kelas) {
            return !empty($kelas->id_penanggung) && !empty($kelas->waktu_awal) && !empty($kelas->waktu_akhir) && !empty($kelas->keperluan) && !empty($kelas->status);
        });
    
        // Mengirim data ke view
        $data['all_classes'] = $allClasses; // Data untuk tabel pertama
        $data['yoga'] = $filteredData; // Data yang sudah difilter untuk tabel kedua
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'menu' => 'Masuk ke Menu Kelas Admin',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
        echo view('header', $data);
        echo view('menu');
        echo view('kelas_admin', $data);
        echo view('footer');

    
} else {
    return redirect()->to('home/login');
}
    }



    public function e_kelas($id)
    {
        $model = new M_projek;
        $where = array('kelas.id_user' => $id);
        $data['yoga'] = $model->joinKelasWithUser($where); // Ambil data kelas dengan username
        $data['dua'] = $model->getWhere1('kelas', array('id_user' => $id))->getRow();
        $where3 = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
        // Ambil username dari tabel user
        $data['username'] = $model->getUsernameById($id); // Method baru di model
        $id_user = session()->get('id');
        $activityLog = [
            'id_user' => $id_user,
            'menu' => 'Masuk ke Edit Kelas',
            'time' => date('Y-m-d H:i:s')
        ];
        $model->logActivity($activityLog);
        echo view('header', $data);
        echo view('menu');
        echo view('e_kelas', $data);
        echo view('footer');
        // print_r($data['yoga']);
    }
    public function aksi_e_kelas()
{
    // Mengambil data dari form
    $yoga1 = $this->request->getPost('namakelas');
    $yoga2 = $this->request->getPost('posisikelas');
    $yoga3 = $this->request->getPost('jumlahmeja');
    $yoga4 = $this->request->getPost('jumlahmonitor');
    $yoga5 = $this->request->getPost('jumlahkursi');
    $yoga6 = $this->request->getPost('jumlahcpu');
    $yoga7 = $this->request->getPost('jumlahmouse');
    $yoga8 = $this->request->getPost('jumlahkeyboard');
    $yoga9 = $this->request->getPost('jumlahmikroskop');
    $yoga10 = $this->request->getPost('jumlahburette');
    $yoga11 = $this->request->getPost('jumlahrangkamanusia');
    $yoga12 = $this->request->getPost('waktuawal');
    $yoga13 = $this->request->getPost('waktuakhir');
    $yoga14 = $this->request->getPost('keperluan');
    $yoga15 = $this->request->getPost('status');
    $id = $this->request->getPost('id'); // ID Kelas

    $model = new M_projek(); 

    // Ambil data lama
    $oldData = $model->getWhere1('kelas', ['id_kelas' => $id])->getRow();

    if ($oldData) {
        // Backup data lama
        $backupData = [
            'id_kelas' => $oldData->id_kelas,
            'nama_kelas' => $oldData->nama_kelas,
            'posisi_kelas' => $oldData->posisi_kelas,
            'jumlah_meja' => $oldData->jumlah_meja,
            'jumlah_monitor' => $oldData->jumlah_monitor,
            'jumlah_kursi' => $oldData->jumlah_kursi,
            'jumlah_cpu' => $oldData->jumlah_cpu,
            'jumlah_mouse' => $oldData->jumlah_mouse,
            'jumlah_keyboard' => $oldData->jumlah_keyboard,
            'jumlah_mikroskop' => $oldData->jumlah_mikroskop,
            'jumlah_burette' => $oldData->jumlah_burette,
            'jumlah_rangka_manusia' => $oldData->jumlah_rangka_manusia,
            'waktu_awal' => $oldData->waktu_awal,
            'waktu_akhir' => $oldData->waktu_akhir,
            'keperluan' => $oldData->keperluan,
            'status' => $oldData->status,
            'id_penanggung' => $oldData->id_penanggung,
            'create_by' => $oldData->create_by,
            'updated_by' => $oldData->updated_by,
            'deleted_by' => $oldData->deleted_by,
            'create_at' => $oldData->create_at,
            'updated_at' => $oldData->updated_at,
            'deleted_at' => $oldData->deleted_at,
            'backup_at' => date('Y-m-d H:i:s'),
            'backup_by' => session()->get('id'), // ID pengguna yang membuat backup
        ];

        // Debug: Cek apakah backup berhasil
        if ($model->saveToBackup('kelas_backup', $backupData)) {
            // Update data kelas
            $oke = [
                'nama_kelas' => $yoga1,
                'posisi_kelas' => $yoga2,
                'jumlah_meja' => $yoga3,
                'jumlah_monitor' => $yoga4,
                'jumlah_kursi' => $yoga5,
                'jumlah_cpu' => $yoga6,
                'jumlah_mouse' => $yoga7,
                'jumlah_keyboard' => $yoga8,
                'jumlah_mikroskop' => $yoga9,
                'jumlah_burette' => $yoga10,
                'jumlah_rangka_manusia' => $yoga11,
                'waktu_awal' => $yoga12,
                'waktu_akhir' => $yoga13,
                'keperluan' => $yoga14,
                'status' => $yoga15,
                'id_penanggung' => session()->get('id'),
                'updated_by' => session()->get('id'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $where = ['id_kelas' => $id];
            $model->edit('kelas', $oke, $where);

            return redirect()->to('home/kelas_admin')->with('message', 'Data kelas berhasil diupdate.');
        } else {
            echo "Gagal menyimpan data ke backup.";
        }
    } else {
        echo "Data lama tidak ditemukan.";
    }
}

public function buat_kelas()
{
    // Ambil data tambahan jika diperlukan (misalnya, data setting atau user)
    $model = new M_projek;
    $data['setting'] = $model->getWhere1('setting', ['id_setting' => '1'])->getRow();
    $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'menu' => 'Masuk ke Form Buat Kelas',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    // Tampilkan view form buat_kelas
    echo view('header', $data);
    echo view('menu');
    echo view('buat_kelas', $data); // Pastikan view ini ada di folder Views
    echo view('footer');
}


public function aksi_t_kelas()
{
    // Mengambil data dari form
    $yoga1 = $this->request->getPost('namakelas');
    $yoga2 = $this->request->getPost('posisikelas');
    $yoga3 = $this->request->getPost('jumlahmeja');
    $yoga4 = $this->request->getPost('jumlahmonitor');
    $yoga5 = $this->request->getPost('jumlahkursi');
    $yoga6 = $this->request->getPost('jumlahcpu');
    $yoga7 = $this->request->getPost('jumlahmouse');
    $yoga8 = $this->request->getPost('jumlahkeyboard');
    $yoga9 = $this->request->getPost('jumlahmikroskop');
    $yoga10 = $this->request->getPost('jumlahburette');
    $yoga11 = $this->request->getPost('jumlahrangkamanusia');
    
    // Ambil ID pengguna yang sedang login
    $idUser = session()->get('id');
    
    // Siapkan data untuk disimpan
    $yoga = [
        'nama_kelas' => $yoga1,
        'posisi_kelas' => $yoga2,
        'jumlah_meja' => $yoga3,
        'jumlah_monitor' => $yoga4,
        'jumlah_kursi' => $yoga5,
        'jumlah_cpu' => $yoga6,
        'jumlah_mouse' => $yoga7,
        'jumlah_keyboard' => $yoga8,
        'jumlah_mikroskop' => $yoga9,
        'jumlah_burette' => $yoga10,
        'jumlah_rangka_manusia' => $yoga11,
        'create_by' => $idUser, // ID pengguna yang membuat data
        'create_at' => date('Y-m-d H:i:s'),
        'id_user' => $idUser,
        'status' => 'Kosong',
    ];
    
    // Inisialisasi model
    $model = new M_projek();
    
    // Simpan data ke tabel 'kelas'
    $model->tambah('kelas', $yoga);
    
    // Redirect ke halaman admin setelah berhasil
    return redirect()->to('home/kelas_admin');
}


public function selesai_kelas($id)
{
    // Load model
    $model = new M_projek();

    // Menentukan data yang akan diupdate
    $data = [
        'id_penanggung' => null,
        'waktu_awal' => null,
        'waktu_akhir' => null,
        'keperluan' => null,
        'status' => 'Kosong'
    ];

    // Menentukan kondisi where untuk update
    $where = ['id_kelas' => $id];

    // Update data di tabel kelas
    if ($model->edit('kelas', $data, $where)) {
        // Redirect ke halaman yang diinginkan setelah update berhasil
        return redirect()->to('home/kelas_admin')->with('message', 'Kelas telah dikosongkan dan status diubah menjadi "Kosong".');
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        return redirect()->to('home/kelas_admin')->with('error', 'Gagal mengosongkan kelas. Silakan coba lagi.');
    }
}


public function restore()
    {
        if (session()->get('id') > 0) {
            helper('permission'); // Pastikan helper dimuat

            // Cek apakah user memiliki hak akses untuk 'pemesanan'


                $model = new M_projek();
                // $this->logUserActivity('Masuk ke Restore');
                $where3 = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
                $data['yoga'] = $model->tampil1('kelas');
                $id_user = session()->get('id');
                $activityLog = [
                    'id_user' => $id_user,
                    'menu' => 'Masuk ke Restore',
                    'time' => date('Y-m-d H:i:s')
                ];
                $model->logActivity($activityLog);
                echo view('header', $data);
                echo view('menu', $data);
                echo view('restore', $data);
                echo view('footer');

            
        } else {
            return redirect()->to('home/login');
        }
        }
        public function restore_edit()
        {

            if (session()->get('id') > 0) {
                helper('permission'); // Pastikan helper dimuat
    
                // Cek apakah user memiliki hak akses untuk 'pemesanan'
              
            $model = new M_projek();
            $data['yoga'] = $model->tampil('kelas_backup');
            $where3 = array('id_setting' => '1');
            $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();
            $id_user = session()->get('id');
            $activityLog = [
                'id_user' => $id_user,
                'menu' => 'Masuk ke Restrore Edit',
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);
            // Ensure the view names are correct and exist
            echo view('header', $data);
            echo view('menu', $data);
            echo view('restore_edit', $data);
            echo view('footer');

    } else {
        return redirect()->to('home/login');
    }

        }
        

        public function restore_data_edit($id)
        {
            $model = new M_projek();
        
            // Check if the backup data exists
            $backupData = $model->getBackupData1('kelas_backup', $id);
        
            if ($backupData) {
                // Unset the fields you don't want to restore
                unset($backupData['backup_by']);
                unset($backupData['backup_at']);
                
                $restoreSuccess = $model->restoreProduct('kelas', 'id_kelas', $id, $backupData);
        
                if ($restoreSuccess) {
                    // Delete the backup data after successful restore
                    $deleteSuccess = $model->deleteBackupData('kelas_backup', 'id_kelas', $id);
                    if ($deleteSuccess) {
                        return redirect()->to('home/kelas_admin')->with('success', 'Data restored and backup deleted successfully!');
                    } else {
                        return redirect()->to('home/kelas_admin')->with('error', 'Data restoration succeeded but failed to delete backup!');
                    }
                } else {
                    return redirect()->to('home/kelas_admin')->with('error', 'Data restoration failed!');
                }
            } else {
                // Handle the case when there's no backup data
                return redirect()->to('home/kelas_admin')->with('error', 'Backup data not found!');
            }
        }
        




private function updatelog($update,$table)
    {
        $model = new M_projek();
        $data = [
            'id_user'    => session()->get('id'),
            'updated'   => $update,
            'timestamp' => date('Y-m-d H:i:s'),
            'table' => $table
        ];

        $model->tambah('updatelog', $data);
    }


        public function hapus_permanent($id)
        {
            $model = new M_projek();
            // $this->logUserActivity('Menghapus Pemesanan Permanent');
            $where = array('id_pemesanan' => $id);
            $model->hapus('pemesanan', $where);
    
            return redirect()->to('Home/restore');
        }


        public function hapus_kelas($id)
    {
        $model = new M_projek();
        $where = array('id_kelas' => $id);
        $array = array(
            'deleted_at' => date('Y-m-d H:i:s'),
        );
        $model->edit('kelas', $array, $where);
        // $this->logUserActivity('Menghapus Pemesanan');

        return redirect()->to('Home/kelas_admin');
    }

    public function soft_delete($id)
    {
        $model = new M_projek();
        $where = array('id_kelas' => $id);
        $array = array(
            'deleted_at' => NULL, // Mengatur deleted_at menjadi null
        );
        $model->edit('kelas', $array, $where);
    
        return redirect()->to('Home/kelas_admin');
    }
    


public function setting()
    {if (session()->get('id') > 0) {
        helper('permission'); // Pastikan helper dimuat

        // Cek apakah user memiliki hak akses untuk 'pemesanan'
       
           
                $model = new M_projek;
                // $this->logUserActivity('Masuk ke setting');
                $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();

                $id_user = session()->get('id');
                $activityLog = [
                    'id_user' => $id_user,
                    'menu' => 'Masuk ke Settings',
                    'time' => date('Y-m-d H:i:s')
                ];
                $model->logActivity($activityLog);
                echo view('header', $data);
                echo view('menu');
                echo view('setting', $data);
                echo view('footer');
           
            
        
    }
}
    public function aksi_e_setting()
    {
        $model = new M_projek();
        // $this->logUserActivity('Melakukan Setting');
        $namaWebsite = $this->request->getPost('namawebsite');
        $id = $this->request->getPost('id');
        $id_user = session()->get('id');
        $where = array('id_setting' => '1');

        $data = array(
            'nama_website' => $namaWebsite,
            'update_by' => $id_user,
            'update_at' => date('Y-m-d H:i:s')
        );

        // Cek apakah ada file yang diupload untuk favicon
        $favicon = $this->request->getFile('img');
        if ($favicon && $favicon->isValid() && !$favicon->hasMoved()) {
            // Beri nama file unik
            $faviconNewName = $favicon->getRandomName();
            // Pindahkan file ke direktori public/images
            $favicon->move(WRITEPATH . '../public/images', $faviconNewName);

            // Tambahkan nama file ke dalam array data
            $data['tab_icon'] = $faviconNewName;
        }

        // Cek apakah ada file yang diupload untuk logo
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            // Beri nama file unik
            $logoNewName = $logo->getRandomName();
            // Pindahkan file ke direktori public/images
            $logo->move(WRITEPATH . '../public/images', $logoNewName);

            // Tambahkan nama file ke dalam array data
            $data['logo_website'] = $logoNewName;
        }

        // Cek apakah ada file yang diupload untuk logo
        $login = $this->request->getFile('login');
        if ($login && $login->isValid() && !$login->hasMoved()) {
            // Beri nama file unik
            $loginNewName = $login->getRandomName();
            // Pindahkan file ke direktori public/images
            $login->move(WRITEPATH . '../public/images', $loginNewName);

            // Tambahkan nama file ke dalam array data
            $data['login_icon'] = $loginNewName;
        }

        $model->edit('setting', $data, $where);

        // Optionally set a flash message here
        return redirect()->to('home/setting');
    }

   public function log_activity()
{

    if (session()->get('id') > 0) {
        helper('permission'); // Pastikan helper dimuat

        // Cek apakah user memiliki hak akses untuk 'pemesanan'
      
    $model = new M_projek();

    // Get all users for the dropdown filter
    $data['users'] = $model->getAllUsers(); // Make sure to implement getAllUsers() in your model

    // Get the user ID from the query string
    $userId = $this->request->getGet('user_id');

    // Fetch logs with optional filtering
    if (!empty($userId)) {
        $data['logs'] = $model->getLogsByUser($userId);
    } else {
        $data['logs'] = $model->getLogs();
    }

    // Additional data and log the current activity
    $where = array('id_setting' => '1');
    $data['darren2'] = $model->getwhere('setting', $where);
    $id_user = session()->get('id');
    $activityLog = [
        'id_user' => $id_user,
        'menu' => 'Masuk ke Log Activity',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

    $where3 = array('id_setting' => '1');
    $data['yogi'] = $model->getWhere1('setting', $where3)->getRow();

    // Load the views
    echo view('header', $data);
    echo view('menu', $data);
    echo view('log_activity', $data);
    echo view('footer');

} else {
return redirect()->to('home/login');
}

}

public function hapus_log()
{
    $model = new M_projek();
    $id_log = $this->request->getPost('id_log'); // Retrieve 'id_log' from POST request

    if (!empty($id_log)) {
        $deleted = $model->deleteLogById($id_log); // Use the updated model method
        if ($deleted) {
            return redirect()->to(base_url('home/log_activity'))->with('success', 'Activity log deleted successfully.');
        } else {
            return redirect()->to(base_url('home/log_activity'))->with('error', 'Failed to delete activity log.');
        }
    } else {
        return redirect()->to(base_url('home/log_activity'))->with('error', 'Invalid Log ID.');
    }
}


public function laporan()
    {
       
        if (session()->get('id') > 0) {
            helper('permission'); // Pastikan helper dimuat

            // Cek apakah user memiliki hak akses untuk 'pemesanan'
           
                $model = new M_projek();
               
                $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();
                $data['dua'] = $model->join('kelas', 'user', 'kelas.id_user=user.id_user');
                $id_user = session()->get('id');
                $activityLog = [
                    'id_user' => $id_user,
                    'menu' => 'Masuk ke Laporan',
                    'time' => date('Y-m-d H:i:s')
                ];
                $model->logActivity($activityLog);

                echo view('header', $data);
                echo view('menu', $data);
                echo view('laporan', $data);
                echo view('footer');
          
           
        } else {
            return redirect()->to('home/login');
        }

            }

            public function aksi_laporan_pdf()
    {
       
                $pdf = new \TCPDF();
                $model = new M_projek();
                // $id_user = session()->get('id');
                $tanggal_awal = $this->request->getGet('awal');
                $tanggal_akhir = $this->request->getGet('akhir');

                $data['kelas'] = $model->carikelas($tanggal_awal, $tanggal_akhir);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Your Name');
                $pdf->SetTitle('Nota');
                $pdf->SetSubject('Nota');
                $pdf->SetKeywords('Nota, PDF');
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // Set margins
                $pdf->SetMargins(5, 5, 5); // Left, Top, Right
                $pdf->AddPage('L');
                $backgroundPath = ROOTPATH . 'public/images/permata.png';
                $pdf->SetAlpha(0.25);
                $pdf->Image(
                    $backgroundPath,   // Path to the image
                    80,                // X position
                    90,                // Y position
                    120,                // Image width
                    100,                // Image height
                    '',                // No specific image file type
                    '',                // No specific URL
                    '',                // No specific image alignment
                    false,             // No interlaced option
                    150,               // DPI
                    '',                // No specific color profile
                    false,             // No alpha channel
                    false,             // No transparency
                    0,                 // No rotation
                    '',                // No specific image stretch
                    false,             // No resizing option
                    false,             // No image format
                    false,             // No clip option
                    false,             // No auto orientation
                    false,             // No image alignment
                    false              // No image transparency
                );
                $pdf->SetAlpha(1.0);

                // Set font
                $pdf->SetFont('helvetica', '', 8); // Set font size to 8px

                // Set some content to print
                $html = view('print', $data); // Pastikan view 'print' sesuai dengan perubahan
                
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->Output('nota.pdf', 'I');
                exit();
    }


                
                
    public function aksi_laporan_excel()
    {
        $model = new M_projek();
        $tanggal_awal = $this->request->getGet('awal');
        $tanggal_akhir = $this->request->getGet('akhir');

        $data['kelas'] = $model->carikelas($tanggal_awal, $tanggal_akhir);

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul laporan
        $sheet->setCellValue('A1', 'Laporan Kelas');

        // Merge cell untuk judul laporan
        $sheet->mergeCells('A1:H1');

        // Set style untuk judul laporan
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

        // Set style untuk cell judul laporan
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Set header untuk kolom
        $sheet->setCellValue('A2', 'Nama Peminjam');
        $sheet->setCellValue('B2', 'Nama Kelas');
        $sheet->setCellValue('C2', 'Posisi Kelas');
        $sheet->setCellValue('D2', 'Waktu Awal');
        $sheet->setCellValue('E2', 'Waktu Akhir');
        $sheet->setCellValue('F2', 'Keperluan');
        $sheet->setCellValue('G2', 'Kondisi');
        $sheet->setCellValue('H2', 'Tanggal');
      
        // Mengatur lebar kolom
        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(20);
       
        // Membuat judul tebal
        $sheet->getStyle('A2:J2')->getFont()->setBold(true);

        // Mengisi data ke dalam sheet
        $rowIndex = 3; // Mulai dari baris 3 setelah judul dan header
        foreach ($data['kelas'] as $row) {
            $sheet->setCellValue('A' . $rowIndex, $row->penanggung_username);
            $sheet->setCellValue('B' . $rowIndex, $row->nama_kelas);
            $sheet->setCellValue('C' . $rowIndex, $row->posisi_kelas);
            $sheet->setCellValue('D' . $rowIndex, $row->waktu_awal);
            $sheet->setCellValue('E' . $rowIndex, $row->waktu_akhir);
            $sheet->setCellValue('F' . $rowIndex, $row->keperluan);
            $sheet->setCellValue('G' . $rowIndex, $row->kondisi);
            $sheet->setCellValue('H' . $rowIndex, $row->tanggal);
           

            $rowIndex++;
        }

        // Menambahkan total harga
       

     

        // Menambahkan border
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray($styleArray);

        // Setelah mengisi data, simpan spreadsheet ke dalam file atau kirim ke browser
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Laporan Kelas.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }


    public function windows_print()
    {
        $model = new M_projek();
        $where = array('id_setting' => '1');
        $data['yogi'] = $model->getWhere1('setting', $where)->getRow();
    
        $tanggal_awal = $this->request->getGet('awal');
        $tanggal_akhir = $this->request->getGet('akhir');
    
        $data['kelas'] = $model->carikelas($tanggal_awal, $tanggal_akhir);
    
        // Tampilkan view dengan data
        echo view('header', $data);
        echo view('windows_print', $data);
    }
    public function level()
    {
        if (session()->get('id') > 0) {
            helper('permission'); // Pastikan helper dimuat

            // Cek apakah user memiliki hak akses untuk 'pemesanan'
          
                $model = new M_projek();
                $where = array('id_setting' => '1');
                $data['yogi'] = $model->getWhere1('setting', $where)->getRow();
                helper('permission');

                echo view('header', $data);
                echo view('menu', $data);
                echo view('level', $data);
                echo view('footer');
            
        } else {
            return redirect()->to('home/login');
        }

           
    }
    public function hak_akses($level)
    {
        if (session()->get('id') > 0) {
            helper('permission'); // Pastikan helper dimuat

            // Cek apakah user memiliki hak akses untuk 'pemesanan'
           
                $model = new M_projek();
                $where = array('id_setting' => '1');
                $data2['yogi'] = $model->getWhere1('setting', $where)->getRow();

                $permissionModel = new LevelPermissionModel();
                $permissions = $permissionModel->getPermissionsByLevel($level);

                $data = [
                    'level' => $level,
                    'permissions' => $permissions,
                ];

                echo view('header', $data2);
                echo view('menu', $data2);
                echo view('hak_akses', $data);
                echo view('footer');
            
        } else {
            return redirect()->to('home/login');
        }
    }

    public function update_hak_akses($level)
    {
        $permissions = $this->request->getPost('permissions');

        $permissionModel = new LevelPermissionModel();
        $permissionModel->updatePermissionsByLevel($level, $permissions);

        return redirect()->to('home/hak_akses/' . $level);
    }
    
}
