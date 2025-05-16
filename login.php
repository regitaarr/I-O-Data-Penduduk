<?php
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIDAK</title>
    <link rel="icon" href="dist/img/sleman.png">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Custom Styles -->
    <style>
		.background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .background img {
            width: 100%;
            height: 111%;
            object-fit: cover;
            object-position: center;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            margin: 0 auto;
            position: relative;
            top: 100px;
        }
        .input-timbul:focus {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-color: #007bff;
            background-color: #f9f9f9;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .card-body img.logo {
            width: 120px;
            height: auto;
            border-radius: 50%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
	<div class="background">
			<img src="dist/img/jogja2.png" alt="Background">
	</div>
	<!-- <div class="hold-transition login-page"> -->
		<div class="login-box">
			<div class="card">
				<div class="card-body login-card-body">
					<center>
						<img src="dist/img/sleman.png" alt="Logo" class="logo" />
						<h5><b>Sistem Data Kependudukan Kalurahan Sinduadi</b></h5>
					</center>

					<form action="" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control input-timbul" name="username" placeholder="Username" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control input-timbul" name="password" placeholder="Password" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
						</div>
						<div class="row">
							<div class="col-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
									<b>Login</b>
								</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	<!-- </div> -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['btnLogin'])) {  
    // Anti SQL injection
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk cek username
    $sql_check_username = "SELECT * FROM tb_pengguna WHERE BINARY username='$username'";
    $query_check_username = mysqli_query($koneksi, $sql_check_username);
    $data_username = mysqli_fetch_array($query_check_username, MYSQLI_BOTH);
    $jumlah_username = mysqli_num_rows($query_check_username);

    // Cek jika username tidak ditemukan
    if ($jumlah_username == 0) {
        echo "<script>
            Swal.fire({title: 'Username tidak ditemukan!', text: '', icon: 'error', confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'login.php';}});
        </script>";
    } else {
        // Jika username ditemukan, periksa password
        $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
        $query_login = mysqli_query($koneksi, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        // Cek jika password salah
        if ($jumlah_login == 0) {
            echo "<script>
                Swal.fire({title: 'Username atau password salah!', text: '', icon: 'error', confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'login.php';}});
            </script>";
        } else {
            // Jika login berhasil
            session_start();
            $_SESSION["ses_id"] = $data_login["id_pengguna"];
            $_SESSION["ses_nama"] = $data_login["nama_pengguna"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_password"] = $data_login["password"];
            $_SESSION["ses_level"] = $data_login["level"];

            echo "<script>
                Swal.fire({title: 'Login Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'}).then((result) => {if (result.value){window.location = 'index.php';}});
            </script>";
        }
    }
}
?>