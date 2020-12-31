<?php 
require_once "lib/core.php";
if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $query = mysqli_query($connect, "DELETE FROM `pages` WHERE id='$id'");
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
                            <h1 class="m-0">Pages</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Pages</li>
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
              <h4 class="box-header round-top">Pages</h4>
              <div class="box-container-toggle">
                  <div class="box-content">
				  <center><a href="add_page.php" class="btn btn-default"><i class="fa fa-edit"></i> Add Page</a></center><br />
<?php
$sql    = "SELECT * FROM pages ORDER by id DESC";
$result = mysqli_query($connect, $sql);
$count  = mysqli_num_rows($result);
if ($count <= 0) {
    echo 'There are no pages.';
} else {
    echo '
            <table class="table table-bordered table-striped table-hover">
                <thead>
				<tr>
                    <th>ID</th>
                    <th>Title</th>
					<th>Actions</th>
                </tr>
				</thead>
';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                <tr>
	                <td>' . $row['id'] . '</td>
	                <td>' . $row['title'] . '</td>
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
?></center>
                  </div>
              </div>
            </div>
        </div>
      </div>
 
<?php
if (isset($_GET['edit-id'])) {
    $id  = (int) $_GET["edit-id"];
    $sql = mysqli_query($connect, "SELECT * FROM `pages` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=pages.php">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=pages.php">';
    }
?>
    <div class="row">
        <div class="col-md-12 column">
            <div class="box">
              <h4 class="box-header round-top">Edit Page</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
<center><form action="" method="post">
<p>
	<label>Title</label>
	<input name="title" type="text" class="form-control" value="<?php
    echo $row['title'];
?>" required>
</p>
<p>
	<label>Content</label>
	<textarea name="content" required><?php
    echo html_entity_decode($row['content']);
?></textarea>
</p>
<br /><input type="submit" class="btn btn-primary" name="submit" value="Update" /><br />
</form>
<?php
    if (isset($_POST['submit'])) {
        $title   = addslashes($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        
        $update = "UPDATE pages SET title='$title', content='$content' WHERE id='$id'";
        $sql    = mysqli_query($connect, $update);
        echo '<meta http-equiv="refresh" content="0; url=pages.php">';
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
        <script>
            CKEDITOR.replace( 'content' );
        </script>
        <?php include_once "partials/scripts.php"; ?> 
    </body>    
</html>