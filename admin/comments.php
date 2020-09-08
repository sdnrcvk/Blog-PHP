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
          <h1>Yorumlar</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorumlar</li>
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
                <a href="comments.php" class="float-left">
                  <i class="nav-icon fas fa-comments"></i>
                  Yorumlar
                </a>
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
                    <th style="text-align:center;">Yorum Ekleyen</th>
                    <th style="text-align:center;">Yazı Konu</th>
                    <th style="text-align:center;">Yorum Ekleyen Email</th>
                    <th style="text-align:center;">Tarih</th>
                    <th style="text-align:center;">Durum</th>
                    <th style="text-align:center;">Cevaplanma</th>
                    <th style="text-align:center;">İşlemler</th>
                  </tr>
                </thead>
            <tbody> 
            
            <?php
            $yorumlar=$db->prepare("SELECT * FROM yorumlar INNER JOIN yazilar ON yazilar.yazi_id=yorumlar.yorum_yazi_id WHERE yorum_ust=? ORDER BY yorum_id DESC ");
            $yorumlar->execute(array(0));
            $y_cek=$yorumlar->fetchAll(PDO::FETCH_ASSOC);
            $y_say=$yorumlar->rowCount();
            if($y_say){
                    foreach($y_cek as $row ){ ?>
            <tr>
            <td style="text-align:center;"><?php echo $row['yorum_id'];?></td>
            <td style="text-align:center;"><?php echo $row['yorum_yapan'];?></td>
            <td style="text-align:center;"><?php echo $row['yazi_title'];?></td>
            <td style="text-align:center;"><?php echo $row['yorum_mail'];?></td>
            <td style="text-align:center;"><?php echo $row['yorum_tarih'];?></td>
            <td style="text-align:center;">
                <?php 
                if($row['yorum_durum']==1){
                        echo "<span class='fa fa-check-circle text-success'></span>";
                    }else{
                        echo "<span class='fa fa-times-circle text-danger'></span>";
                    }
                    ?></td>
            <td style="text-align:center;">
                <?php 
                if($row['yorum_cevap']==1){
                        echo "<span class='fa fa-check-circle text-success'></span>";
                    }else{
                        echo "<span class='fa fa-times-circle text-danger'></span>";
                    }
                    ?></td>
            <td style="text-align:center;">
                <a href="answer-comments.php?yorum_id=<?php echo $row['yorum_id'];?>"><button class="btn btn-success btn-sm"><i class="fa fa-comment"></i> Cevapla</button>
                <a href="edit-comments.php?yorum_id=<?php echo $row['yorum_id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button>
                <a href="process.php?yorumsil_id=<?php echo $row['yorum_id'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button>
            </td>
            </tr>            
            <?php }
                }else{
                  echo "<td colspan='8' style='text-align:center;'> Henüz gelen bir yorum yok...</td>";
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