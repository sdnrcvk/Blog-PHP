  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Paneli</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$username?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yönetim Paneli</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs fa-fw"></i>
              <p>
                Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="genelayarlar.php" class="nav-link">
                  <i class="nav-icon fas fa-cog fa-fw "></i>
                  <p>Genel Ayarlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="socialmedia.php" class="nav-link">
                  <i class="nav-icon fab fa-slack"></i>
                  <p>Sosyal Medya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logo-favicon.php" class="nav-link">
                  <i class="nav-icon fas fa-smile"></i>
                  <p>Logo & Favicon</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="articles.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Yazılar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="categories.php" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Kategoriler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Yorumlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comments.php" class="nav-link">
                  <i class="nav-icon fas fa-comment-dots"></i>
                  <p>Yorumları Listele</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="answers.php" class="nav-link">
                  <i class="nav-icon fas fa-check"></i>
                  <p>Cevapları Listele</p>
                </a>
              </ul>
          </li>
          <li class="nav-item">
            <?php
            $mesajlar=$db->prepare("SELECT * FROM mesajlar ");
            $mesajlar->execute(array());
            $mesajlar->fetchAll(PDO::FETCH_ASSOC); 
            $say=$mesajlar->rowCount();
            ?>
            <a href="messages.php" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mesajlar
                <span class="badge badge-info right"><?php echo $say; ?></span>
              </p>
            </a>
          </li>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>