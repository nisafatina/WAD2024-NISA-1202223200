<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent(){
    // variabel global
    global $conn;

    if (isset($_POST['submit'])) {
        $stuname = $_POST["stuname"];
        $stuid = $_POST["stuid"];
        $stuclass = $_POST["stuclass"];
        $stuangkatan = $_POST["stuangkatan"];

        $ret = mysqli_query($conn, "SELECT * FROM tb_student WHERE nim = '$stuid'");
        if (mysqli_num_rows($ret) == 0)
            // Masukkan data ke tabel tb_student
            $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan) VALUES ('$stuname', '$stuid', '$stuclass', '$stuangkatan')";
            $result = mysqli_query($conn, $query);

            /**
             * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
             * 
             * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
             * dan mengarahkan pengguna ke halaman 'add-students.php'.
             * Jika operasi gagal, menampilkan pesan kesalahan.
             * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
             */

             if ($result) {
                echo '<script>alert("Data Mahasiswa telah ditambahkan.");</script>';
                echo "<script>window.location.href ='add-students.php'</script>";
            } else {
                echo '<script>alert("Data mahasiswa gagal ditambahkan.");</script>';
            }
        } else {
            echo '<script>alert("NIM sudah ada.");</script>';
            echo "<script>window.location.href ='add-students.php'</script>";
        }
    }

            
function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    if (isset($_POST['submit'])) {
        $stuname = $_POST["stuname"];
        $stuid = $_POST["stuid"];
        $stuclass = $_POST["stuclass"];
        $stuangkatan = $_POST["stuangkatan"];


    // Isi query dibawah untuk update data mahasiswa berdasarkan ID
        $query = "UPDATE tb_student SET nama = '$stuname', nim = '$stuid', jurusan = '$stuclass', angkatan = '$stuangkatan' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>alert("Student data has been updated.")</script>';
            echo "<script>window.location.href ='manage-students.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        }
    }
}
?>