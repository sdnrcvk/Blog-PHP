<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: giris.php");
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
              <li class="breadcrumb-item active">Sosyal Medya</li>
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
        <?php }
        } ?>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <a href="sosyal_medya.php" class="float-left">
                  <i class="nav-icon fab fa-slack"></i>
                  Sosyal Medya Link Ayarları
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="post">
                <div class="card-body">
                    <a class="btn btn-block btn-social btn-twitter">
                    <label>Twitter</label>
                        <i class="fab fa-twitter"></i><input type="text" value="<?php echo $check_settings['site_twitter'];?>" name="site_twitter"  class="form-control">
                    </a>
                    <a class="btn btn-block btn-social btn-linkedin">
                    <label>Linkedin</label>
                        <i class="fab fa-linkedin"></i><input type="text" value="<?php echo $check_settings['site_linkedin'];?>" name="site_linkedin"  class="form-control">
                    </a>
                    <a class="btn btn-block btn-social btn-instagram">
                    <label>İnstagram</label>
                        <i class="fab fa-instagram"></i><input type="text" value="<?php echo $check_settings['site_instagram'];?>" name="site_instagram"  class="form-control">
                    </a>
                    <a class="btn btn-block btn-social btn-github">
                    <label>Github</label>
                        <i class="fab fa-github"></i><input type="text" value="<?php echo $check_settings['site_github'];?>" name="site_github"  class="form-control">
                    </a>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="sosyal_medya" class="btn btn-primary">Güncelle</button>
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