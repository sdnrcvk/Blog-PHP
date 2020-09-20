<?php
session_start();
include "../mysql_connect.php";

if(isset($_POST['login'])){

    $admin_email=htmlspecialchars(trim($_POST['admin_email']));
    $admin_password=htmlspecialchars(trim(md5($_POST['admin_password'])));

  if(!$admin_email || !$admin_password) {
    header("location: giris.php?durum=empty");
  }else{

    $adminask=$db->prepare("SELECT * FROM kullanıcılar WHERE email=? AND password=?");
    $adminask->execute([$admin_email,$admin_password]);
    $admin=$adminask->fetch(PDO::FETCH_ASSOC);
    echo $count=$adminask->rowCount();
    
    if($count==1){
        $_SESSION['session']=true;
        $_SESSION['fullname']=$admin['full_name'];
        $_SESSION['admin_email']=$admin['email'];
        header("location: index.php");
        exit;
    }else{
                header("location: giris.php?durum=no");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Paneli | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b>Paneli</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><i class="fas fa-sign-in-alt"></i> Lütfen Giriş Yapın</p>

      <form action="giris.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="admin_email" placeholder="Enter Your Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="admin_password" placeholder="Enter Your Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="login">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">Şifremi unuttum</a>
      </p>
      <p class="mb-0">
        <a href="kayitol.php" class="text-center">Hesabınız yok mu? Kayıt Ol</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php 

        if (isset($_GET['durum'])){
                    
          $durum=$_GET['durum'];

            if($durum=="empty"){ ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-exclamation-triangle"></i>
            Lütfen boş alan bırakmayınız!
        </div>
            <?php }elseif($durum=="no"){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-times-circle"></i>
           E-mail adresiniz veya şifreniz yanlış!
        </div>
        <?php }
        } ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
