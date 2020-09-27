<?php
include "includes/header.php";
$yazi_id=$_GET['yazi_id'];
$kategori_id=$_GET['kategori_id'];
$articles=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id=yazilar.yazi_kategori_id WHERE yazi_id=?");
$articles->execute(array($yazi_id));
$article=$articles->fetch(PDO::FETCH_ASSOC);

$comments=$db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=1 AND yorum_ust=0");
$comments->execute(array($yazi_id));
$comment=$comments->fetchAll(PDO::FETCH_ASSOC);
$count_comment=$comments->rowCount();

if(!isset($_POST['post_comment'])){
    if(!empty($_POST['name'])){
    $name=$_POST['name'];
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            if(!empty($_POST['message'])){
                $website=$_POST['website'];
                $message=$_POST['message'];

                $p_comment=$db->prepare("INSERT INTO yorumlar (yorum_yapan, yorum_mail, yorum_website, yorum_icerik,yorum_yazi_id) VALUES (?,?,?,?,?)");
                $post_comment=$p_comment->execute(array($name,$email,$website,$message,$yazi_id));
                header("location: single?yazi_id=$yazi_id&kategori_id=$kategori_id&durum=yes");
          }
      }
  }
}


$hit = $db->prepare("UPDATE yazilar SET yazi_okunma= yazi_okunma +1 WHERE yazi_id=?");
$hit->execute(array($yazi_id));
?>

<div class="hero-wrap js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
      <div class="col-lg-10 ftco-animate d-flex align-items-center">
        <div class="text text-center">
          <h4 class="mb-3 bread"><?php echo $article['yazi_title'];?></h4>
          <p class="breadcrumbs"><span class="mr-2"><a href="index">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $article['yazi_title'];?></span></p>
        </div>
      </div>
    </div>
  </div>
</div>
  
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
      <h2><?php echo $article['yazi_title'];?></h2>
      <div class="post-thumbnail">
      <img src="images/yazilar/<?php echo $article['yazi_foto'];?>" alt="Php coding" class="img-fluid">
      </div>
      <div class="post-text">
        <?php echo $article['yazi_icerik'];?>
      </div>
    <div class="display-info">
    <p>
      <span><a href="about" title="<?php echo $article['yazi_yazan'];?>"><i class="icon-user-circle"></i>&nbsp;<?php echo $article['yazi_yazan'];?>&nbsp;</a></span>|
      <span><a href="list_categories"><i class="icon-search"></i>&nbsp;<?php echo $article['kategori_title'];?>&nbsp;</a></span>|
      <span><i class="icon-calendar"></i>&nbsp;<?php echo $article['yazi_tarih'];?>&nbsp;</a></span>|
      <span><i class="icon-chat"></i>&nbsp;<?php echo $count_comment;?>&nbsp;</a></span>|

      <span><i class="icon-eye"></i>&nbsp;<?php echo $article['yazi_okunma'];?>&nbsp;</a></span>
    </p>
    </div>
    <?php
    if (isset($_GET['durum'])){
			
      $durum=$_GET['durum'];
    
      if($durum=="yes"){ ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="icon fas fa-check"></i>
       Yorumunuz başarıyla yapılmıştır!
    </div>
    <?php }
    } ?>
    
<div class="pt-5 mt-5">
<?php

if($count_comment){
  ?> <h3 class="mb-5"><?php echo $count_comment ?> Comments </h3> <?php
  foreach($comment as $row){ ?>

<ul class="comment-list">
  <li class="comment">
    <div class="vcard bio">
      <img src="images/users-17.png" alt="Image placeholder">
    </div>
    <div class="comment-body">
      <h3><?php echo $row['yorum_yapan']; ?></h3>
      <div class="meta"><?php echo $row['yorum_tarih']; ?></div>
      <p><?php echo $row['yorum_icerik']; ?></p>
    </div>
</li> 
<?php 
$cevaplar=$db->prepare("SELECT * FROM yorumlar WHERE yorum_ust=?");
$cevaplar->execute(array($row['yorum_id']));
$cevapcek=$cevaplar->fetchAll(PDO::FETCH_ASSOC);
foreach($cevapcek as $c_cek){ ?>

  <ul class="children">
    <li class="comment">
      <div class="vcard bio">
        <img src="images/admin.png" alt="Image placeholder">
      </div>
      <div class="comment-body">
        <h3><?php echo $c_cek['yorum_yapan']; ?></h3>
        <div class="meta"><?php echo $c_cek['yorum_tarih']; ?></div>
        <p><?php echo $c_cek['yorum_icerik']; ?></p>
      </div>
    </li>
  <?php } ?>
  </ul>
  <?php }  
      }else{
        echo "<b>Bu yazıya henüz yorum yapılmadı!</b>";
      }?>



  <!-- END comment-list -->
  
  <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="" method="post" class="p-5 bg-light" >
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="url" class="form-control" id="website" name="website">
      </div>

      <div class="form-group">
        <label for="message">Message *</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Post Comment" name="postcomment" class="btn py-3 px-4 btn-primary">
      </div>

    </form>
  </div>
</div>

   <?php 
   include "includes/sidebar.php";
   include "includes/footer.php";
   ?>