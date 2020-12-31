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
                            <h1 class="m-0">Add Category</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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
              <div class="box-container-toggle">
                  <div class="box-content">
                                <center><form action="" method="post">
								<p>
									<label>Title</label>
									<input class="form-control" name="category" value="" type="text" required>
								</p>
								<div class="form-actions">
                                    <input type="submit" name="add" class="btn btn-primary" value="Add" />
									<input type="reset" class="btn" value="Reset" />
                                </div>
								</form>

<?php
if (isset($_POST['add'])) {
    $category = $_POST['category'];
    
    $add = "INSERT INTO categories (category) VALUES ('$category')";
    $sql = mysqli_query($connect, $add);
    echo '<meta http-equiv="refresh" content="0; url=categories.php">';
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