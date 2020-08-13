 </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 class="heading-sidebar">Categories</h3>
              <ul class="categories">
              <?php
            $categories=$db->prepare("SELECT * FROM kategoriler");
            $categories->execute();
            $check_categories=$categories->fetchAll(PDO::FETCH_ASSOC);
            foreach($check_categories as $row){?>
                <li><a href="#"><?php echo $row['kategori_title'];?> <span>(12)</span></a></li>
            <?php } ?>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-sidebar">Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> March 12, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> March 12, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> March 12, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-sidebar">Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">house</a>
                <a href="#" class="tag-cloud-link">office</a>
                <a href="#" class="tag-cloud-link">building</a>
                <a href="#" class="tag-cloud-link">land</a>
                <a href="#" class="tag-cloud-link">table</a>
                <a href="#" class="tag-cloud-link">interior</a>
                <a href="#" class="tag-cloud-link">exterior</a>
                <a href="#" class="tag-cloud-link">industrial</a>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading-sidebar">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
            </div>
        </div>
      </div>
    </section> <!-- .section -->