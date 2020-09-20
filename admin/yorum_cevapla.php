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

$yorum_id=$_GET['yorum_id'];

$yorumlar=$db->prepare("SELECT * FROM yorumlar WHERE yorum_id=? ");
$yorumlar->execute(array($yorum_id));
$yorumcek=$yorumlar->fetch(PDO::FETCH_ASSOC); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yorumlar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Yorumlar</li>
              <li class="breadcrumb-item active">Yorum Cevapla</li>
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
                <a href="kategoriler.php" class="nav-link">
                  <i class="nav-icon fas fa-edit "></i>
                  Yorum Cevapla
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem.php?yorum_id=<?php echo $yorum_id; ?>" method="post" >

              <input type="hidden" name="yorum_yapan" value="Admin">
              <input type="hidden" name="yorum_mail" value="sdnrcvk@gmail.com">
              <input type="hidden" name="yorum_website" value="kodlayanmuhendis.com">
              <input type="hidden" name="yorum_yazi_id" value="<?php echo $yorumcek['yorum_yazi_id']; ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label> Ekleyen Adı</label>
                        <input type="text" class="form-control" value="<?php echo $yorumcek['yorum_yapan']; ?>">
                    </div>
                    <div class="form-group">
                        <label> Tarih</label>
                        <input type="text" class="form-control"value="<?php echo $yorumcek['yorum_tarih'];?> " disabled>
                    </div>
                    <div class="form-group">
                        <label> Yapılan Yorum</label>
                        <textarea class="form-control" cols="5" rows="8"disabled><?php echo $yorumcek['yorum_icerik'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label> Cevapla </label>
                        <textarea class="form-control" cols="5" rows="8" name="yorum_icerik" placeholder="Buradan cevaplayabilirsiniz..."></textarea>
                    </div>
                    <div class="card-footer">
                      <button type="submit"  name="yorum_cevapla" class="btn btn-primary">Cevapla</button>
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