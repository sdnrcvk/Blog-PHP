<?php
include "includes/header.php";
$yazi_id=$_GET['yazi_id'];
$kategori_id=$_GET['kategori_id'];
$articles=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id=yazilar.yazi_kategori_id WHERE yazi_id=?");
$articles->execute(array($yazi_id));
$article=$articles->fetch(PDO::FETCH_ASSOC);
?>
<div class="hero-wrap js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
      <div class="col-lg-10 ftco-animate d-flex align-items-center">
        <div class="text text-center">
          <h4 class="mb-3 bread"><?php echo $article['yazi_title'];?></h4>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $article['yazi_title'];?></span></p>
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
      <img src="images/<?php echo $article['yazi_foto'];?>" alt="Php coding" class="img-fluid">
      </div>
      <div class="post-text">
        <?php echo $article['yazi_icerik'];?>
      </div>
    <div class="display-info">
    <p>
      <span><a href="about.php" title="<?php echo $article['yazi_yazan'];?>"><i class="icon-user-circle"></i>&nbsp;<?php echo $article['yazi_yazan'];?>&nbsp;</a></span>|
      <span><a href="list_categories.php"><i class="icon-search"></i>&nbsp;<?php echo $article['kategori_title'];?>&nbsp;</a></span>|
      <span><i class="icon-calendar"></i>&nbsp;<?php echo $article['yazi_tarih'];?>&nbsp;</a></span>|
      <span><i class="icon-chat"></i>&nbsp;30 Yorum&nbsp;</a></span>|
      <span><i class="icon-eye"></i>&nbsp;<?php echo $article['yazi_okunma'];?>&nbsp;</a></span>
    </p>
    </div>
        
    <div class="about-author d-flex p-4 bg-light">
      <div class="bio mr-5">
        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
      </div>
      <div class="desc">
        <h3>George Washington</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
      </div>
    </div>

<div class="pt-5 mt-5">
<h3 class="mb-5">6 Comments</h3>
<ul class="comment-list">
  <li class="comment">
    <div class="vcard bio">
      <img src="images/person_1.jpg" alt="Image placeholder">
    </div>
    <div class="comment-body">
      <h3>John Doe</h3>
      <div class="meta">Sept. 12, 2019 at 2:21pm</div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
      <p><a href="#" class="reply">Reply</a></p>
    </div>
  </li>

  <li class="comment">
    <div class="vcard bio">
      <img src="images/person_1.jpg" alt="Image placeholder">
    </div>
    <div class="comment-body">
      <h3>John Doe</h3>
      <div class="meta">Sept. 12, 2019 at 2:21pm</div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
      <p><a href="#" class="reply">Reply</a></p>
    </div>

    <ul class="children">
      <li class="comment">
        <div class="vcard bio">
          <img src="images/person_1.jpg" alt="Image placeholder">
        </div>
        <div class="comment-body">
          <h3>John Doe</h3>
          <div class="meta">Sept. 12, 2019 at 2:21pm</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
          <p><a href="#" class="reply">Reply</a></p>
        </div>


        <ul class="children">
          <li class="comment">
            <div class="vcard bio">
              <img src="images/person_1.jpg" alt="Image placeholder">
            </div>
            <div class="comment-body">
              <h3>John Doe</h3>
              <div class="meta">Sept. 12, 2019 at 2:21pm</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
              <p><a href="#" class="reply">Reply</a></p>
            </div>

            <ul class="children">
              <li class="comment">
                <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div>
              </li>
            </ul>
        </li>
      </ul>
    </li>
  </ul>
</li>

    <li class="comment">
      <div class="vcard bio">
        <img src="images/person_1.jpg" alt="Image placeholder">
      </div>
      <div class="comment-body">
        <h3>John Doe</h3>
        <div class="meta">Sept. 12, 2019 at 2:21pm</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
        <p><a href="#" class="reply">Reply</a></p>
      </div>
    </li>
  </ul>
  <!-- END comment-list -->
  
  <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Leave a comment</h3>
    <form action="#" class="p-5 bg-light">
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="url" class="form-control" id="website">
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
      </div>

    </form>
  </div>
</div>

   <?php 
   include "includes/sidebar.php";
   include "includes/footer.php";
   ?>