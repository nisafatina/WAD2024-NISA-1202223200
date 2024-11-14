<?php
include('includes/dbconnection.php'); 
include('includes/function.php'); // Pastikan koneksi menggunakan mysqli

if (isset($_POST["update"])) {
    $stui = $_POST["nim"];
    $stuname = $_POST["stuname"];
    $stuid = $_POST["stuid"];
    $stuclass = $_POST["stuclass"];
    $stuangkatan = $_POST["stuangkatan"];

    $query = "UPDATE tb_student SET
            nama='$stuname',
            jurusan='$stuclass',
            angkatan='$stuangkatan'
            WHERE nim='$stuid'";


    $test = mysqli_query($conn, $query);

    
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: edit-students.php");
    } else {
        echo "
        <script>
            alert('Data failed');
            document.location.href = edit-students.php;
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>U-WIBU || Edit Student</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>
        <div class="page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Edit Student </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Edit Student</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title" style="text-align: center;">Edit Students</h4>
                            <form class="forms-sample" action="" method="post">
                                <div class="form-group">
                                <label for="stuname">Student Name</label>
                                <input type="text" name="stuname" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label for="stuid">NIM</label>
                                <input type="text" name="stuid" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label for="stuclass">Jurusan</label>
                                <select name="stuclass" class="form-control" required>
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Teknik Domain Expansion">Teknik Domain Expansion</option>
                                    <option value="Ilmu Pengendalian Chuunibyou">Ilmu Pengendalian Chuunibyou</option>
                                    <option value="Psikologi Hubungan Anime">Psikologi Hubungan Anime</option>
                                    <option value="Manajemen Isekai">Manajemen Isekai</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="stuangkatan">Angkatan</label>
                                <input type="number" name="stuangkatan" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2" name="update">Update</button>

                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
</body>

</html>