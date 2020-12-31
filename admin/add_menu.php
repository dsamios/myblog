<?php 
require_once "lib/core.php";
?>

<!DOCTYPE html>
<html>
    <!-- head -->
    <?php include_once "partials/head.php"; ?>  
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include_once "partials/navbar.php"; ?>
            <!-- Main Sidebar Container -->
            <?php include_once "partials/sidebar.php"; ?> 
            <!-- Content Wrapper. Contains page content -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Menu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Menu</li>
                            </ol>
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container">
                     

                    <div class="row">
        
        <div class="col-md-12 column">
            <div class="box">
              <h4 class="box-header round-top">Add Menu</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                                <center><form action="" method="post">
								<p>
									<label>Title</label>
									<input class="form-control" name="page" value="" type="text" required>
								</p>
								<p>
									<label>Path (Link)</label>
									<input class="form-control" name="path" value="" type="text" required>
								</p>
                                <p>
									<label>Font Awesome Icon</label>
									<input class="form-control" name="fa_icon" value="" type="text">
								</p>
								<div class="form-actions">
                                    <input type="submit" name="add" class="btn btn-primary" value="Add" />
									<input type="reset" class="btn" value="Reset" />
                                </div>
								</form>

<?php
if (isset($_POST['add'])) {
    $page    = $_POST['page'];
    $path    = $_POST['path'];
    $fa_icon = $_POST['fa_icon'];
    $add     = "INSERT INTO menu (page, path, fa_icon) VALUES ('$page', '$path', '$fa_icon')";
    $sql     = mysqli_query($connect, $add);
    echo '<meta http-equiv="refresh" content="0;url=menu_editor.php">';
}
?></center>                               
                  </div>
              </div>
            </div>
        </div>
      </div>
                    



                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Content Wrapper. Contains page content -->
            <?php include_once "partials/footer.php"; ?>        
        </div>
        <!-- ./wrapper -->
        <!-- Scripts -->
        <?php include_once "partials/scripts.php"; ?> 
    </body>    
</html>