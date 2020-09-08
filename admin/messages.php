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
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mesajlar</li>
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
                <a href="articles.php" class="float-left">
                  <i class="nav-icon fas fa-envelope"></i>
                  Mesajlar
                </a>
                <a href="add-categories.php" class="btn btn-primary btn-sm float-right"><i class="nav-icon fa fa-plus"></i> Kategori Ekle</a>
              </div>
              <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="example1_length">
                <label>Show 
                <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option></select> entries</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="example1_filter" class="dataTables_filter">
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                </div>
            </div>
        </div>
      <div class="row">
          <div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
          <thead>
          <tr role="row">
            <th style="text-align:center;"> # </th>
            <th style="text-align:center;">Gönderen Adı</th>
            <th style="text-align:center;">Konu</th>
            <th style="text-align:center;">Tarih</th>
            <th style="text-align:center;">Durum</th>
            <th style="text-align:center;">İşlemler</th>
          </tr>
          </thead>
          <tbody> <?php

        $mesajlar=$db->prepare("SELECT * FROM mesajlar ORDER BY mesaj_id DESC ");
        $mesajlar->execute();
        $mesajcek=$mesajlar->fetchAll(PDO::FETCH_ASSOC);
        $mesajsay=$mesajlar->rowCount();
        if($mesajsay){
            foreach($mesajcek as $row ){ ?>

            <tr>
              <td style="text-align:center;"><?php echo $row['mesaj_id'];?></td>
              <td style="text-align:center;"><?php echo $row['mesaj_gonderenisim'];?></td>
              <td style="text-align:center;"><?php echo $row['mesaj_konu'];?></td>
              <td style="text-align:center;"><?php echo $row['mesaj_tarih'];?></td>
              <td style="text-align:center;">
              <?php 
              if($row['mesaj_okunma']==1){
                      echo "<span class='fa fa-eye-slash'></span>";
                  }else{
                      echo "<span class='fa fa-eye'></span>";
                  }
                  ?></td>
              <td style="text-align:center;">
                  <a href="read-messages.php?mesaj_id=<?php echo $row['mesaj_id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Cevapla</button>
                  <a href="process.php?mesajsil_id=<?php echo $row['mesaj_id'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button>
              </td>
            </tr>
        <?php }
        }else{
          echo "<td colspan='6' style='text-align:center;'> Henüz gelen bir mesajınız yok...</td>";
        } ?>
          </tbody>
        </table>
                <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
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