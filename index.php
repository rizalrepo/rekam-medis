<?php require 'app/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/images/logo.png">
    <title>Login Sistem</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/alert/sweetalert.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div style="text-align: center;">
                    <img src="assets/images/logo.png" alt="Logo" width="180">
                </div>
                <hr>
                <h6 class="login-box-msg">Aplikasi Rekam Medis dan Pelayanan Kesehatan MCU RSUD DR. H. ANDI ABDURRAHMAN NOOR</h6>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-block bg-cyan" name="log">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script src="assets/alert/sweetalert.min.js"></script>

</body>

</html>

<?php
if (isset($_POST['log'])) {
    $user = $con->real_escape_string($_POST['username']);
    $pass = $con->real_escape_string($_POST['password']);

    $pass = md5($pass);
    $query = $con->query("SELECT * FROM user WHERE username = '$user' AND password='$pass'");
    $data = $query->fetch_array();
    $username = $data['username'];
    $password = $data['password'];
    $id = $data['id_user'];
    $level = $data['level'];
    $usr = $data['nm_user'];

    if ($user == $username && $pass == $password) {

        $_SESSION["login"] = true;
        $_SESSION['id_user'] = $id;
        $_SESSION['level'] = $level;
        $_SESSION['nm_user'] = $usr;

        if ($level != 3) {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Login Berhasil',
                        text:  'Anda Login Sebagai $usr',
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.location.replace('admin/');
                } ,2000);   
            </script>";
        } else {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Login Berhasil',
                        text:  'Anda Login Sebagai $usr',
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.location.replace('dokter/');
                } ,2000);   
            </script>";
        }
    } else {
        echo "
        <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Login Gagal',
                    text:  'Username atau Password Tidak Ditemukan',
                    type: 'error',
                    timer: 2000,
                    showConfirmButton: false
                });     
            },10);  
            window.setTimeout(function(){ 
                window.location.replace('index');
            } ,2000);   
        </script>";
    }
}
