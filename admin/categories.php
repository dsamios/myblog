<?php 
require_once "lib/core.php";
if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $query = mysqli_query($connect, "DELETE FROM `categories` WHERE id='$id'");
    $query = mysqli_query($connect, "DELETE FROM `posts` WHERE category_id='$id'");
}
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
                            <h1 class="m-0">Categories</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
              <h4 class="box-header round-top">Categories</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
				  <center><a href="add_category.php" class="btn btn-default"><i class="fa fa-edit"></i> Add Category</a></center><br />
<?php
$sql    = "SELECT * FROM categories ORDER by id DESC";
$result = mysqli_query($connect, $sql);
$count  = mysqli_num_rows($result);
if ($count <= 0) {
    echo 'There are no categories.';
} else {
    echo '
            <table class="table table-bordered table-striped table-hover">
                <thead>
				<tr>
				    <th>ID</th>
                    <th>Category</th>
					<th>Actions</th>
                </tr>
				</thead>
';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                <tr>
				    <td>' . $row['id'] . '</td>
	                <td>' . $row['category'] . '</td>
					<td>
					    <a href="?edit-id=' . $row['id'] . '" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
						<a href="?delete-id=' . $row['id'] . '" title="Delete" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a>
					</td>
                </tr>
';
    }
    echo '
            </table>
';
}
?>
                  </div>
              </div>
            </div>
        </div>
      </div>
 
<?php
if (isset($_GET['edit-id'])) {
    $id  = (int) $_GET["edit-id"];
    $sql = mysqli_query($connect, "SELECT * FROM `categories` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=categories.php">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=categories.php">';
    }
?>
    <div class="row">
        <div class="col-md-12 column">
            <div class="box">
              <h4 class="box-header round-top">Edit Category</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
<center><form action="" method="post">
								<p>
									<label>Category</label>
									<input class="form-control" class="form-control" name="category" type="text" value="<?php
    echo $row['category'];
?>" required>
								</p>
<div class="form-actions">
    <input type="submit" class="btn btn-primary" name="submit" value="Save" /><br />
</div>
</form>
<?php
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $edit     = "UPDATE categories SET category='$category' WHERE id='$id'";
        $sql      = mysqli_query($connect, $edit);
        echo '<meta http-equiv="refresh" content="0; url=categories.php">';
    }
?></center>
                  </div>
              </div>
            </div>
        </div>
     </div>
<?php
}
?>

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