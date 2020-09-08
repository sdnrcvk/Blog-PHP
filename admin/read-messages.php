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

$mesaj_id=$_GET['mesaj_id'];

$mesajlar=$db->prepare("SELECT * FROM mesajlar WHERE mesaj_id=? ");
$mesajlar->execute(array($mesaj_id));
$mesajcek=$mesajlar->fetch(PDO::FETCH_ASSOC); 
$say=$mesajlar->rowCount();

if($say){
  $x=$db->prepare("UPDATE mesajlar SET mesaj_okunma=? WHERE mesaj_id=?");
  $x->execute(array(1,$mesaj_id));
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesajlar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mesajlar</li>
              <li class="breadcrumb-item active">Mesaj Cevapla</li>
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
                  Mesaj Oku & Cevapla
                </a>
                </h3>
              </div>
              

              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                    <label>Gönderen İsim</label>
                    <input type="text" class="form-control" value="<?php echo $mesajcek['mesaj_gonderenisim']; ?> " disabled>
                </div>
                <div class="form-group">
                    <label>Gönderen Mail</label>
                    <input type="text" class="form-control" value="<?php echo $mesajcek['mesaj_gonderenmail']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Konu</label>
                    <input type="text" class="form-control" value="<?php echo $mesajcek['mesaj_konu']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea class="form-control" rows="5" disabled><?php echo $mesajcek['mesaj_aciklama']; ?></textarea>
                </div>
              </div>
        <!--Cevaplama kısmı-->    

              <form id="mesajform" action="" method="post" onsubmit="return false;">
                
                    <input type="hidden" name="gonderen" value="sdnrcvk@gmail.com">
                    <input type="hidden" name="gonderilenmail" value="<?php echo $mesajcek['mesaj_gonderenmail']; ?>">

                <div class="card-body">
                    <div class="form-group">
                        <label>Cevapla (<?php echo $mesajcek['mesaj_gonderenmail']; ?>)</label>
                        <textarea class="form-control" name="mesaj" rows="5"></textarea>
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit" onclick="mesajCevapla();" class="btn btn-primary">Gönder</button>
                    </div>
              </form>
              <script type="text/javascript">
              function mesajCevapla(){
                var degerler=$("#mesajform").serialize();
                $.ajax({
                  type : "POST",
                  url : "answer-messages.php",
                  data : degerler,
                  success : function(sonuc){
                    if(sonuc=="bos"){
                      swal("Dikkat","Lütfen boş alan bırakmayınız!","warning");

                    }else if(sonuc=="no"){
                      swal("Hata","Mesaj cevaplanırken bir hata oluştu!","error");
                    
                    }else if(sonuc=="yes"){
                      swal({
                        title : "Tebrikler!",
                        text : "Mesaj başarıyla cevaplandı!",
                        type : "success",
                        html : true
                        }, function(){
                          location.reload();
                        });
                    }
                  }
                });
              }
            </script>
      </div>
            <!-- /.card -->
    </section> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







<?php
include("includes/footer.php"); 
?>