<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: login.php");
}


include("includes/header.php"); ?>
<?php 
include("includes/sidebar.php");?>
<?php

$settings=$db->prepare("SELECT * FROM ayarlar ");
$settings->execute();
$check_settings=$settings->fetch(PDO::FETCH_ASSOC); 

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ayarlar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ayarlar</li>
              <li class="breadcrumb-item active">Logo & Favicon</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <?php 

      if (isset($_GET['update'])){
                  
        $update=$_GET['update'];
            
            if($update=="empty"){ ?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Dikkat!</h5>
            Lütfen boş alan bırakmayınız...
        </div>
            <?php }elseif($update=="no"){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Hata!</h5>
           Güncelleme işlemi yapılırken bir hata oluştu...
        </div>
            <?php }elseif($update=="yes"){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Tebrikler!</h5>
            Güncelleme işlemi başarıyla yapıldı...
        </div>
        <?php }elseif($update=="gecersizuzanti"){ ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Dikkat!</h5>
            Sadece JPG,PNG ve JPEG uzantılı resimleri yükleyebilirsiniz...
        </div>
        <?php }elseif($update=="buyuk"){ ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Dikkat!</h5>
             En fazla 1 MB büyüklüğünde resim yükleyebilirsiniz...
        </div>
        <?php }
        } ?>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <a href="genelayarlar.php" class="float-left">
                  <i class="nav-icon fas fa-smile"></i>
                  Logo Düzenle
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Şuanki Logo</label><br>
                       <img src="../blog/images/<?php echo $check_settings['site_logo'];?>" alt="Sedanur Çevik" class="img-responsive" width="5%" height="5%">
                    </div>
                    <div class="form-group">
                        <label>Site Logo</label>
                        <input type="file" class="form-control" value="<?php echo $check_settings['site_logo'];?>"name="site_logo" >
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  name="logo_düzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div>
            
            <!-- /.card -->

    </section>
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <a href="genelayarlar.php" class="float-left">
                  <i class="nav-icon fas fa-smile"></i>
                  Favicon Düzenle
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="process.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Şuanki Favicon</label><br>
                       <img src="../blog/images/<?php echo $check_settings['site_favicon'];?>" alt="Sedanur Çevik" class="img-responsive" width="5%" height="5%">
                    </div>
                    <div class="form-group">
                        <label>Site Favicon</label>
                        <input type="file" class="form-control" value="<?php echo $check_settings['site_favicon'];?>"name="site_favicon" >
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit"  name="favicon_düzenle" class="btn btn-primary">Güncelle</button>
                </div>
              </form>
            </div>
            
            <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







<?php
include("includes/footer.php"); 
?>