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
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yazılar</li>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card card-primary">
              <div class="card-header">
                <a href="yazilar.php" class="float-left">
                  <i class="nav-icon fas fa-tags"></i>
                  Kategori Düzenle/Sil
                </a>
                <a href="kategori_ekle.php" class="btn btn-primary btn-sm float-right"><i class="nav-icon fa fa-plus"></i> Kategori Ekle</a>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="example1_filter" class="dataTables_filter">
            </div>
        </div>
              <div class="row">
                  <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th style="text-align:center;"> # </th>
                    <th style="text-align:center;">Kategori Adı</th>
                    <th style="text-align:center;">Yazı Sayısı</th>
                    <th style="text-align:center;">İşlemler</th>
                  </tr>
                  </thead>
                  <tbody> <?php

                $kategoriler=$db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id DESC ");
                $kategoriler->execute();
                $kategoricek=$kategoriler->fetchAll(PDO::FETCH_ASSOC);
                $kategorisay=$kategoriler->rowCount();
                if($kategorisay){
                    foreach($kategoricek as $row ){ 

                    $yazilar=$db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=? ");
                    $yazilar->execute(array($row['kategori_id']));
                    $yazilar->fetchAll(PDO::FETCH_ASSOC);
                    $yazisay=$yazilar->rowCount();?>

                  <tr>
                    <td style="text-align:center;"><?php echo $row['kategori_id'];?></td>
                    <td style="text-align:center;"><?php echo $row['kategori_title'];?></td>
                    <td style="text-align:center;"><?php echo $yazisay; ?></td>
                    <td style="text-align:center;">
                        <a href="kategori_duzenle.php?kategori_id=<?php echo $row['kategori_id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button>
                        <a href="islem.php?kategorisil_id=<?php echo $row['kategori_id'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button>
                    </td>
                  </tr>
                  <?php }
                }else{
                  echo "<td colspan='5' style='text-align:center;'> Henüz oluşturulmuş bir kategori yok...</td>";
                } ?>
                  </tbody>
                </table>
                <div class="row"><div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"></div>
                </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php
include("includes/footer.php"); 
?>