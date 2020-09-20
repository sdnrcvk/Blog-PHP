<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: giris.php");
}

include("includes/header.php");
include("includes/sidebar.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yazılar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Yazılar</li>
              <li class="breadcrumb-item active">Yazı Ekle</li>
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
                <a href="genelayarlar.php" class="nav-link">
                  <i class="nav-icon fas fa-plus "></i>
                  Yazı Ekle
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                    <div class="form-group">
                        <label>Fotoğraf Yükle</label><br>
                        <input type="file" class="form-control" name="yazi_foto" required>
                    </div>
                    <div class="form-group">
                        <label>Yazı Başlık</label>
                        <input type="text" class="form-control" name="yazi_title" placeholder="Yazınızın başlığını giriniz..." required>
                    </div>
                    <div class="form-group"> 
                      <label for="kategoriler">Yazı Kategori</label>
                      <select id="kategoriler" name="yazi_kategori" class="form-control">
                      <?php 
                      $kategoriler =$db->prepare("SELECT * FROM kategoriler");
                      $kategoriler->execute();
                      $kategoricek=$kategoriler->fetchAll(PDO::FETCH_ASSOC);
                      foreach($kategoricek as $row){
                      ?>
                        <option value="<?php echo $row['kategori_id'];?>"><?php echo $row['kategori_title'];?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <!-- /.card-header -->
                    <div class="form-group">
                      <label>Yazı İçerik</label>
                      <textarea id="summernote" name="yazi_icerik" placeholder="Yazınızın içeriğini giriniz..." required></textarea>
                    </div>
                    <div class="card-footer">
                      <button type="submit"  name="yazi_ekle" class="btn btn-primary">Ekle</button>
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