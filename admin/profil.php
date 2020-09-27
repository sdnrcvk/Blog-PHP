<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: giris.php");
}

include("includes/header.php");
include("includes/sidebar.php"); 

$user_id=8;

$admin=$db->prepare("SELECT * FROM kullanıcılar WHERE user_id=? ");
$admin->execute(array($user_id));
$admincek=$admin->fetch(PDO::FETCH_ASSOC); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kullanıcı Profili</li>
              <li class="breadcrumb-item active">Admin</li>
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
                <a href="profil.php" class="nav-link">
                  <i class="nav-icon fas fa-edit "></i>
                  Kullanıcı Adı Değiştir
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="profil_duzenle.php?user_id=<?php echo $admincek['user_id']; ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input type="text" class="form-control" name="full_name" value="<?php echo $admincek['full_name']; ?>">
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit"  name="kadi_degistir" class="btn btn-primary">Güncelle</button>
                    </div>
              </form>
      </div>
            <!-- /.card -->
    </section> 
    <!-- /.content -->

    <section class="content">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                <a href="profil.php" class="nav-link">
                  <i class="nav-icon fas fa-edit "></i>
                  Şifre Değiştir
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="profil_duzenle.php?user_id=<?php echo $admincek['user_id']; ?>" method="post">
                <div class="card-body">
                <div class="form-group">
                        <label>Eski Şifre</label>
                        <input type="password" class="form-control" name="eski_sifre" >
                    </div>
                    <div class="form-group">
                        <label>Yeni Şifre</label>
                        <input type="password" class="form-control" name="yeni_sifre" >
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit"  name="sifre_degistir" class="btn btn-primary">Güncelle</button>
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