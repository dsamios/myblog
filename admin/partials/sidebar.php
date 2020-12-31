<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="./assets/img/logo.png" alt="myBlog" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">myBlog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $uname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          
            <li class="nav-header">Main</li>
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
                        echo 'active';
                    }
                    ?>
                ">
                    <i class="nav-icon fa fa-home"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                    Settings
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="messages.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'messages.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-envelope"></i>
                <p>
                    Messages
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'users.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    Users
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="menu_editor.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'menu_editor.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-bars"></i>
                <p>
                    Menu Editor
                </p>
                </a>
            </li>

            <li class="nav-header">Posts</li>
            <li class="nav-item">
                <a href="add_post.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'add_post.php') {
                        echo 'active';
                    }
                    ?>
                ">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>
                    Add Post
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="posts.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'posts.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-list"></i>
                <p>
                Posts
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="categories.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'categories.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-list-ol"></i>
                <p>
                Categories
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="comments.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'comments.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-comments"></i>
                <p>
                Comments
                </p>
                </a>
            </li>

            <li class="nav-header">Gallery</li>
            <li class="nav-item">
                <a href="add_image.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'add_image.php') {
                        echo 'active';
                    }
                    ?>
                ">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>
                    Add Image
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="gallery.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'gallery.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-image"></i>
                <p>
                Gallery
                </p>
                </a>
            </li>

            <li class="nav-header">Pages</li>
            <li class="nav-item">
                <a href="add_page.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'add_page.php') {
                        echo 'active';
                    }
                    ?>
                ">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>
                    Add Page
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages.php" class="nav-link
                    <?php
                    if (basename($_SERVER['SCRIPT_NAME']) == 'pages.php') {
                        echo 'active';
                    }
                    ?>
                ">
                <i class="nav-icon fa fa-file-text-o"></i>
                <p>
                Pages
                </p>
                </a>
            </li>
            
            
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>