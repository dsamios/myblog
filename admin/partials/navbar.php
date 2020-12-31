<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./add_post.php" class="nav-link"><i class="fa fa-edit"></i> Write Post</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./settings.php" class="nav-link"><i class="fa fa-cogs"></i> Settings</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./messages.php" class="nav-link"><i class="fa fa-envelope"></i> Messages</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./menu_Editor.php" class="nav-link"><i class="fa fa-bars"></i> Menu Editor</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./add_page.php" class="nav-link"><i class="fa fa-file-alt"></i> Add Page</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./upload_image.php" class="nav-link"><i class="fa fa-upload"></i> Add Image</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> <?php echo $uname; ?>
          <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
            <a href="logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout <a>          
        </div>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->