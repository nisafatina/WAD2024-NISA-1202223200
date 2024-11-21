<?php

class AuthController
{
    private $conn;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'config/database.php';
        $this->conn = $conn;
    }

    public function login()
    {
        $conn = $this->conn;
        if (isset($_POST['submit'])) {

            $nim = $_POST["nim"];
            $password = $_POST["password"];
    
            $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
            $result = mysqli_query($this->conn, $query);
            $data_mahasiswa = mysqli_fetch_assoc($result);
    
            if ($data_mahasiswa){
                if (password_verify($password, $data_mahasiswa['password'])) {
                    $_SESSION["login"] = true;
                    $_SESSION["user"] = $data_mahasiswa;
                    $_SESSION["message"] = "Login Berhasil";
                if (isset($input["remember"])) {
                    setcookie("nim", $data['nim'], time() + (86400 * 30), "/"); // 30 hari
                    setcookie("password", $data['password'], time() + (86400 * 30), "/"); // 30 hari
                } else {
                    setcookie("nim", "", time() - 3600, "/");
                    setcookie("password", "", time() - 3600, "/"); // hapus cookie
                }
    
                header('Location: index.php?controller=dashboard&action=index');
                exit;
            } else {
                $_SESSION['message'] = "Login Gagal NIM atau Password Salah";
                $_SESSION['color'] = "danger";
            }
        } else {
            $_SESSION['message'] = "Email tidak ditemukan";
            $_SESSION['color'] = "NIM Tidak Ditemukan";
        }
            

            // TODO: Lengkapi fungsi login dengan langkah berikut:
            // 1. Ambil nim dari form login menggunakan $_POST dan simpan di variabel $nim
            // 2. Ambil password dari form login menggunakan $_POST dan simpan di variabel $password
            // 3. Buat query untuk mencari mahasiswa berdasarkan NIM dan simpan di variabel $query
            // 4. Eksekusi query menggunakan mysqli_query dan simpan di variabel $result
            // 5. Ambil hasil query menggunakan mysqli_fetch_assoc dan simpan di variabel $data_mahasiswa
            // 6. Jika data hasil query ditemukan:
            //    - Jika password valid (gunakan password_verify):
            //      - Set session login = true
            //      - Set session user dengan $data_mahasiswa
            //      - Set session message dengan "Login Berhasil"
            //      - Jika remember_me dicentang (gunakan isset()):
            //        - Buat cookie untuk nim
            //        - Buat cookie untuk password
            //      - Jika tidak dicentang:
            //        - Hapus cookie nim
            //        - Hapus cookie password
            //      - Redirect ke halaman dashboard menggunakan header('Location: index.php?controller=dashboard&action=index')
            //      - Jangan lupa exit setelah redirect
            //    - Jika verifikasi password salah, set session message "Login Gagal NIM atau Password Salah"
            // 7. Jika data hasil query tidak ditemukan, set session message "NIM Tidak Ditemukan"

        }

        include 'views/auth/login.php';
    }

    private function getJurusan($jurusan){
        // TODO: Lengkapi fungsi untuk mendapatkan kode jurusan
        // 1. Buat variabel $kode_jurusan dengan nilai default 0
        // 2. Gunakan switch-case atau if-else untuk mengatur variabel $kode_jurusan:
        //    - jika jurusan = kedokteran, maka $kode_jurusan = 11
        //    - jika jurusan = psikologi, maka $kode_jurusan = 12
        //    - jika jurusan = biologi, maka $kode_jurusan = 13
        //    - jika jurusan = teknik informatika, maka $kode_jurusan = 14
        // 3. Return nilai kode_jurusan
        $kode_jurusan = 0;
        if ($jurusan = "kedokteran"){
            $kode_jurusan = 11;
        }
        if ($jurusan = "psikologi"){
            $kode_jurusan = 12;
        }
        if ($jurusan = "biologi"){
            $kode_jurusan = 13;
        }
        if ($jurusan = "keteknik informatika"){
            $kode_jurusan = 14;
        }

    
    }

    private function generateNIM($id_pendaftaran){
        $conn = $this->conn;

        $query = "SELECT * FROM pendaftaran WHERE id = '$id_pendaftaran'";
        $result = mysqli_query($this->conn, $query);
        $data_pendaftaran = mysqli_fetch_assoc($result);
        $tahunmasuk = date('y');

        if ($data_mahasiswa){
            $jurusan = "SELECT jurusan FROM pendaftaran WHERE data_mahasiswa = '$id_pendaftaran'";
            $kode_jurusan = $this->getJurusan($jurusan);
    }



        // TODO: Lengkapi fungsi untuk generate NIM dengan format: kode_jurusan + tahun_masuk + id_pendaftaran
        // 1. Buat query untuk mengambil data pendaftaran berdasarkan $id_pendaftaran dan simpan di variabel $query
        // 2. Eksekusi query menggunakan mysqli_query dan simpan di variabel $result
        // 3. Ambil hasil query menggunakan mysqli_fetch_assoc dan simpan di variabel $data_pendaftaran
        // 4. Ambil tahun sekarang dalam format 2 digit menggunakan date('y') dan simpan di variabel $tahunmasuk
        // 5. Jika data hasil query ditemukan:
        //    - Ambil data jurusan dari $data_pendaftaran menggunakan $data_pendaftaran['jurusan'] dan simpan di variabel $jurusan
        //    - Dapatkan kode jurusan menggunakan fungsi $this->getJurusan($jurusan) dan simpan di variabel $kode_jurusan
        //    - Jika $kode_jurusan valid (bukan sama dengan 0):
        //      - Buat variabel $nim dengan nilai NIM dengan format: $kode_jurusan + $tahunmasuk + $id_pendaftaran. Opsional: Gunakan str_pad() untuk id_pendaftaran
        //          * Contoh penggunaan str_pad(): str_pad(1, 2, '0', STR_PAD_LEFT) akan menghasilkan '01'
        //          * Contoh NIM: 142301 (14=Teknik Informatika, 24=tahun 2024, 01=ID pendaftaran)
        //      - Return nim
        //    - Return false jika kode jurusan tidak valid
        // 6. Return false jika data tidak ditemukan
    }

    public function register_step_1()
    {
        $conn = $this->conn;
        if (isset($_POST['submit'])) {
            // TODO: Lengkapi fungsi register step 1
            // 1. Ambil id_pendaftaran dari form register step 1 dan simpan di variabel $id_pendaftaran
            // 2. Buat query untuk mencari pendaftaran berdasarkan id_pendaftaran dengan status 'lulus' dan simpan di variabel $query
            // 3. Eksekusi query menggunakan mysqli_query dan simpan di variabel $result
            // 4. Ambil hasil query menggunakan mysqli_fetch_assoc dan simpan di variabel $data_pendaftaran
            // 5. Jika data hasil query ditemukan:
            //    - Set session id_pendaftaran dengan $id_pendaftaran
            //    - Redirect ke register step 2 menggunakan header('Location: index.php?controller=auth&action=register_step_2')
            //    - Jangan lupa exit setelah redirect
            // 6. Jika data hasil query tidak ditemukan:
            //    - Set session message error

        }
        
        include 'views/auth/register_step_1.php';
    }

    public function register_step_2() 
    {
        $conn = $this->conn;
        // TODO: Cek apakah id_pendaftaran sudah ada di session
        // 1. Jika id_pendaftaran belum ada di session:
        //    - Redirect ke halaman register step 1
        //    - Gunakan header('Location: index.php?controller=auth&action=register_step_1')
        //    - Jangan lupa exit setelah redirect

        if (isset($_POST['submit'])) {
            // TODO: Ambil data dari form register step 2
            // 1. Ambil password dari form dan simpan di variabel $password 
            // 2. Ambil confirm_password dari form dan simpan di variabel $confirm_password

            // TODO: Validasi password
            // 1. Cek apakah password sama dengan confirm_password
            // 2. Jika sama:
            //    - Ambil id_pendaftaran dari session dan simpan di variabel $id_pendaftaran
            //    - Buat query untuk mengambil data pendaftaran berdasarkan id_pendaftaran dan simpan di variabel $query
            //    - Eksekusi query menggunakan mysqli_query dan simpan di variabel $result
            //    - Ambil hasil query menggunakan mysqli_fetch_assoc dan simpan di variabel $data_pendaftaran
            //    - Generate NIM menggunakan fungsi $this->generateNIM($id_pendaftaran) dan simpan di variabel $nim
            //
            //    - Buat query untuk cek apakah NIM sudah ada di database dan simpan di variabel $query_check_nim
            //    - Eksekusi query cek NIM menggunakan mysqli_query dan simpan di variabel $result_check_nim
            //    - Jika NIM sudah ada:
            //      - Set session message "NIM sudah terdaftar"
            //    - Jika NIM belum ada:
            //      - Hash password menggunakan password_hash dengan PASSWORD_DEFAULT dan simpan di variabel $hashed_password
            //      - Ambil nama dari $data_pendaftaran dan simpan di variabel $nama
            //      - Ambil jurusan dari $data_pendaftaran dan simpan di variabel $jurusan
            //      - Buat query INSERT untuk menyimpan data mahasiswa (nim, id_pendaftaran, password, nama, jurusan)
            //      - Eksekusi query INSERT menggunakan mysqli_query dan simpan di variabel $result_insert
            //      - Jika eksekusi query berhasil:
            //        - Set session message berisi informasi bahwa register berhasil dan NIM
            //        - Hapus session id_pendaftaran menggunakan unset()
            //        - Redirect ke halaman login menggunakan header('Location: index.php?controller=auth&action=login')
            //        - Exit setelah redirect
            //      - Jika eksekusi query gagal:
            //        - Set session message "Register Gagal"
            // 3. Jika password tidak sama:
            //    - Set session message "Password Tidak Cocok"
        }

        include 'views/auth/register_step_2.php';
    }

    public function logout() 
    {
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
        exit;

        // TODO: Implementasikan fungsi logout
        // 1. Hapus semua data session menggunakan destroy()
        // 2. Redirect ke halaman login dengan:
        //    - Gunakan header('Location: index.php?controller=auth&action=login')
        //    - Jangan lupa exit setelah redirect
                
    }
}

?>