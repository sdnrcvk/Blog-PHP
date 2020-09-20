<?php

include "includes/header.php";
$search=strip_tags($_GET['search']);

?>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
      <i style="color:red;"><?php echo $search;?></i> ile ilgili sonuçlar...<hr>
     
      <div class="post-text">
      <div class="row d-flex">
			<?php $articles=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id=yazilar.yazi_kategori_id WHERE yazi_title LIKE ? ORDER BY yazi_id DESC");
			$articles->execute(array('%'.$search.'%'));
            $check_articles=$articles->fetchAll(PDO::FETCH_ASSOC);
            $count_text=$articles->rowCount();

            if($count_text){

			foreach($check_articles as $row){ ?>
			<div class="col-md-4 d-flex ftco-animate">      
				<div class="blog-entry justify-content-end">
					<a href="single?yazi_id=<?php echo $row['yazi_id'];?>&kategori_id=<?php echo $row['kategori_id'];?>" title="<?php echo $row['yazi_title'];?>" class="block-20" alt="<?php echo $row['yazi_title'];?>" style="background-image: url('images/<?php echo $row['yazi_foto'];?>');"></a>
					<div class="text mt-3 float-right d-block">
						<h3 class="heading"><a href="single.php" title="<?php echo $row['yazi_title'];?>"><?php echo $row['yazi_title'];?></a></h3>
						<div class="d-flex align-items-center mb-3 meta">
							<p class="mb-0">
							<a href="list_categories?kategori_id=<?php echo $row['kategori_id'];?>" class="mr-2" title="<?php echo $row['kategori_title'];?>"><?php echo $row['kategori_title'];?></a>
							<a href="#" class="meta-eye"><span class="icon-eye">&nbsp;</span><?php echo $row['yazi_okunma'];?></a>
							<a href="#" class="meta-chat">&nbsp;<span class="icon-chat"></span> 3</a><br>
							<a href="#" class="mr-2" title="<?php echo $row['yazi_yazan'];?>"><?php echo $row['yazi_yazan'];?></a><br>
							<span class="mr-2"><?php echo $row['yazi_tarih'];?></span>
							</p>
						</div>
					</div>
				</div>
			</div> <?php } }else{
                echo "<b>Aradığınız kelimeyle ilgili bir veri bulunamadı!</b>";
            } ?>
		</div>
      </div>

<?php 
   include "includes/sidebar.php";
?>
	
<?php 
   include "includes/footer.php";
?>