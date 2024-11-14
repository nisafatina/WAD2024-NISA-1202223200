<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{
    // variabel global
    global $conn;

    if (isset($_POST['submit'])) {
  
        $stuname = $_POST["stuname"];
        
        $stuid = $_POST["stuid"];
        
        $stuclass = $_POST["stuclass"];
        
        $stuangkatan = $_POST["stuangkatan"];
        
        $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan) VALUES ('$stuname', '$stuid', '$stuclass', '$stuangkatan')";
        mysqli_query($conn, $query);
      
      }
      



        /**
         * Buatlah logika untuk Memeriksa hasil dari operasi penambahan data mahasiswa.
         * 
         * Jika operasi berhasil, menampilkan pesan bahwa mahasiswa telah ditambahkan
         * dan mengarahkan pengguna ke halaman 'add-students.php'.
         * Jika operasi gagal, menampilkan pesan kesalahan.
         * Jika NIM sudah ada, menampilkan pesan bahwa NIM sudah ada.
         */
    
        
    }


function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    

    // Isi query dibawah untuk update data mahasiswa berdasarkan ID
    $query = "";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>