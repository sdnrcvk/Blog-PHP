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

include "../mysql_connect.php";
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ayarlar</li>
              <li class="breadcrumb-item active">Genel Ayarlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <?php 
            extract($_GET);
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
        <?php } ?>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
              Genel Ayarlar
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="process.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Site Url</label>
                        <input type="text" class="form-control" name="site_url" value="<?php echo $check_settings['site_url'];?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Site Title</label>
                        <input type="text" class="form-control"  name="site_title" value="<?php echo $check_settings['site_title'];?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Site Description</label>
                        <input type="text" class="form-control"  name="site_desc" value="<?php echo $check_settings['site_desc'];?>" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Site Keywords</label>
                        <input type="text" class="form-control"  name="site_keyw" value="<?php echo $check_settings['site_keyw'];?>" placeholder="Enter ...">
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="genel_ayarlar" class="btn btn-primary">Güncelle</button>
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