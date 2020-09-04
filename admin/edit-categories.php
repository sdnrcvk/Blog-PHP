<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: login.php");
}

include("includes/header.php");
include("includes/sidebar.php"); 

$kategori_id=$_GET['kategori_id'];

$kategori=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=? ");
$kategori->execute(array($kategori_id));
$kategoricek=$kategori->fetch(PDO::FETCH_ASSOC); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategoriler</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategoriler</li>
              <li class="breadcrumb-item active">Kategori Düzenle</li>
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
                <a href="categories.php" class="nav-link">
                  <i class="nav-icon fas fa-edit "></i>
                  Kategori Düzenle
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="process.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" class="form-control" name="kategori_title" value="<?php echo $kategoricek['kategori_title']; ?>">
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit"  name="kategori_duzenle" class="btn btn-primary">Güncelle</button>
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