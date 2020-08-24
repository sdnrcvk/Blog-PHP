<?php

include "includes/header.php";
$kategori_id=$_GET['kategori_id'];
$categories=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=?");
$categories->execute(array($kategori_id));
$check_categories=$categories->fetch(PDO::FETCH_ASSOC);
?>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
      <h2><?php echo $check_categories['kategori_title'];?></h2>
     
      <div class="post-text">
      <div class="row d-flex">
			<?php 
			
			$sayfa=intval($_GET['sayfa']); if(!$sayfa || $sayfa<1){$sayfa=1;}
			$yazi_say=$db->query("SELECT * FROM yazilar WHERE yazi_kategori_id=".$kategori_id);
			$toplam_yazi=$yazi_say->rowCount();
			$limit=1;
			$sayfa_sayisi=ceil($toplam_yazi/$limit); if($sayfa>$sayfa_sayisi){$sayfa=$sayfa_sayisi;}
			$göster=$sayfa*$limit-$limit;
			$görünen_sayfa=2;
			
			$articles=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id=yazilar.yazi_kategori_id WHERE yazi_kategori_id=? ORDER BY yazi_id DESC LIMIT $göster,$limit");
			$articles->execute(array($kategori_id));
			$check_articles=$articles->fetchAll(PDO::FETCH_ASSOC);
			foreach($check_articles as $row){ ?>
			<div class="col-md-4 d-flex ftco-animate">      
				<div class="blog-entry justify-content-end">
					<a href="single.php?yazi_id=<?php echo $row['yazi_id'];?>&kategori_id=<?php echo $row['kategori_id'];?>" title="<?php echo $row['yazi_title'];?>" class="block-20" alt="<?php echo $row['yazi_title'];?>" style="background-image: url('images/<?php echo $row['yazi_foto'];?>');"></a>
					<div class="text mt-3 float-right d-block">
						<h3 class="heading"><a href="single.php?yazi_id=<?php echo $row['yazi_id'];?>&kategori_id=<?php echo $row['kategori_id'];?>"><?php echo $row['yazi_title'];?></a></h3>
						<div class="d-flex align-items-center mb-3 meta">
							<p class="mb-0">
							<a href="list_categories.php?kategori_id=<?php echo $row['kategori_id'];?>" class="mr-2" title="<?php echo $row['kategori_title'];?>"><?php echo $row['kategori_title'];?></a>
							<a href="#" class="meta-eye"><span class="icon-eye">&nbsp;</span><?php echo $row['yazi_okunma'];?></a>
							<a href="#" class="meta-chat">&nbsp;<span class="icon-chat"></span> 3</a><br>
							<a href="#" class="mr-2" title="<?php echo $row['yazi_yazan'];?>"><?php echo $row['yazi_yazan'];?></a><br>
							<span class="mr-2"><?php echo $row['yazi_tarih'];?></span>
							</p>
						</div>
					</div>
				</div>
			</div> <?php } ?>
		</div>
</div>	

<div class="penci-pagination align-center">
	<ul class="page-numbers">
		<?php
		if($sayfa>1){
		?>
			<li><a class="page-numbers" href="list_categories.php?kategori_id=<?php echo $kategori_id;?>&sayfa=1"> << İlk</a></li>
			<li><a class="page-numbers" href="list_categories.php?kategori_id=<?php echo $kategori_id;?>&sayfa=<?php echo $sayfa-1 ?>"> < ÖNCEKİ</a></li>
		<?php } ?>
		<?php for($i=$sayfa-$görünen_sayfa;$i<$sayfa+$görünen_sayfa+1;$i++){
			if($i>0 && $i <= $sayfa_sayisi){
				if($i==$sayfa){
					echo '<li><a class="page-numbers" style ="background-color:#42ade7; color:white;">'.$i.' </a></li>';
				}else{
					echo '<li><a class="page-numbers" href="list_categories.php?kategori_id='.$kategori_id.'&sayfa='.$i.'">'.$i.'</a></li>';
				}
			}
		}
			?>

		<?php if($sayfa!= $sayfa_sayisi){	?> 
			<li><a class="next page-numbers" href="list_categories.php?kategori_id=<?php echo $kategori_id;?>&sayfa=<?php echo $sayfa+1 ?>">SONRAKİ ></a></li>
			<li><a class="page-numbers" href="list_categories.php?kategori_id=<?php echo $kategori_id;?>&sayfa=<?php echo $sayfa_sayisi ?>">SON >></a></li>
		<?php } ?>
			</ul>
</div>



<?php 
   include "includes/sidebar.php";
?>
	
<?php 
   include "includes/footer.php";
?>