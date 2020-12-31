<?php 
require_once "lib/core.php"; 
if (isset($_GET['delete-id'])) {
    $id    = (int) $_GET["delete-id"];
    $query = mysqli_query($connect, "DELETE FROM `users` WHERE id='$id'");
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
                            <h1 class="m-0">Users</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
				  <center><a href="add_user.php" class="btn btn-default"><i class="fa fa-edit"></i> Add User</a></center><br />
                    <table class="table table-striped table-bordered bootstrap-datatable" id="datatable">
                          <thead>
                              <tr>
                                  <th>ID</th>
								  <th>Username</th>
								  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
<?php
$query = mysqli_query($connect, "SELECT * FROM users ORDER by id ASC");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['username'] . '</td>
                                <td>
                                    <a class="btn btn-primary" href="?edit-id=' . $row['id'] . '">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" href="?delete-id=' . $row['id'] . '">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
';
}
?>
                          </tbody>
                     </table>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <?php
if (isset($_GET['edit-id'])) {
    $id  = (int) $_GET["edit-id"];
    $sql = mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($sql);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
    if (mysqli_num_rows($sql) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=users.php">';
    }
?>
	  <div class="row">
        <div class="col-md-12 column">
            <div class="box">
              <h4 class="box-header round-top">Edit User - <?php
    echo $row['username'];
?></h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                    <center><form action="" method="post">
								<div class="form-group">
											<label class="col-sm-4 control-label">Username: </label>
											<div class="col-sm-8">
												<input type="text" name="username" class="form-control" value="<?php
    echo $row['username'];
?>" required>
											</div>
										</div><br />
                                <hr>
                                    <div class="form-group">
								    <label class="col-sm-4 control-label">New Password: </label>
										<div class="col-sm-8">
											<input type="text" name="password" class="form-control">
										</div>
									</div>
                                <br /><i>Fill this field only if you want to change the password.</i>
								<div class="form-actions">
                                    <input type="submit" name="edit" class="btn btn-primary" value="Save" />
                                </div>
							</form>
<?php
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = mysqli_query($connect, "UPDATE `users` SET username='$username' WHERE id='$id'");
        if ($password != null) {
            $password = hash('sha256', $_POST['password']);
            $query    = mysqli_query($connect, "UPDATE `users` SET username='$username', password='$password' WHERE id='$id'");
        }
        echo '<meta http-equiv="refresh" content="0;url=users.php">';
    }
}
?>
                  </div>
              </div>
            </div>
        </div>
      </div>           
                    
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