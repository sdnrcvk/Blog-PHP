<?php
include "../mysql_connect.php";
extract($_POST);

if(isset($_POST['kayit_ol'])){     
  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
  $uye=$db->prepare("SELECT user_id FROM kullanıcılar WHERE email=? ");
  $uye->execute([$email]);
  $mailDurum = $uye->rowCount();
    if(!$mailDurum){ 
      if($password==$re_password){
        $kayit_ol=$db->prepare("INSERT INTO kullanıcılar (`full_name`,`email`,`password`) VALUES (?,?,?)");
        $kayit = $kayit_ol->execute([$fullname,$email,md5($password)]);
        if(!$kayit){
            //var_dump($kayit_ol->errorInfo());   
            echo "Bir hata oluştu geçmiş olsun";
        }else{
          header("location: kayitol.php?durum=yes");
        }
      }else{
        header("location: kayitol.php?durum=farklisifre");
      }
    }else{
      header("location: kayitol.php?durum=farklimail");
    }
  }else{
    header("location: kayitol.php?durum=gecerlimail");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><b>Admin</b>Paneli</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><i class="fas fa-registered"></i> Kayıt Ol </p>

      <form action="kayitol.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="fullname" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="re_password" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               <a href="#">Şartları</a> kabul ediyorum.
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="kayit_ol">Kayıt Ol</button>
          </div>
          <!-- /.col -->
          <p class="mb-1"><br>
          <a href="giris.php">Zaten bir hesabınız var mı? Oturum Aç</a>
          </p>
        </div>
      </form>

    </div>
    <?php 

        if (isset($_GET['durum'])){
                    
          $durum=$_GET['durum'];

            if($durum=="empty"){ ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-exclamation-triangle"></i>
            Lütfen boş alan bırakmayınız!
        </div>
            <?php }elseif($durum=="farklimail"){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-times-circle"></i>
           Bu mail hesabı sistemde mevcut!
        </div>
            <?php }elseif($durum=="gecerlimail"){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-times-circle"></i>
           Geçerli mail adresi giriniz!
        </div>
            <?php }elseif($durum=="farklisifre"){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-times-circle"></i>
           Şifreler farklı, tekrar giriniz!
        </div>
        <?php }elseif($durum=="yes"){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
           Başarıyla kayıt oldunuz!
        </div>
        <?php }
        } ?>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
