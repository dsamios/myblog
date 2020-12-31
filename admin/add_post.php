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
                            <h1 class="m-0">Add Post</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Post</li>
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
              <h4 class="box-header round-top">Add Post</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
                                <center><form action="" method="post">
								<p>
									<label>Title</label>
									<input class="form-control" name="title" value="" type="text" required>
								</p><br />
								<p>
									<label>Image</label>
									<input class="form-control" name="image" value="" type="url" required>
								</p><br />
								<p>
									<label>Active</label><br />
									<select name="active" class="form-control" required>
									    <option value="Yes" selected>Yes</option>
									    <option value="No">No</option>
                                    </select>
								</p><br />
								<p>
									<label>Category</label><br />
									<select name="category_id" class="form-control" required>
									<?php
$crun = mysqli_query($connect, "SELECT * FROM `categories`");
while ($rw = mysqli_fetch_assoc($crun)) {
    echo '
                                    <option value="' . $rw['id'] . '">' . $rw['category'] . '</option>
									';
}
?>
                                    </select>
								</p><br />
								<p>
									<label>Content</label>
									<textarea class="form-control" name="content" required></textarea>
								</p><br />
								<div class="form-actions">
                                    <input type="submit" name="add" class="btn btn-primary" value="Add" />
									<input type="reset" class="btn" value="Reset" />
                                </div>
								</form>

<?php
if (isset($_POST['add'])) {
    $title       = addslashes($_POST['title']);
    $image       = addslashes($_POST['image']);
    $active      = addslashes($_POST['active']);
    $category_id = addslashes($_POST['category_id']);
    $content     = htmlspecialchars($_POST['content']);
    $date        = date('d F Y');
    $time        = date('H:i');

    $query = mysqli_query($connect, "SELECT * FROM `users` WHERE username='$uname'");
    $user = mysqli_fetch_assoc($query);
    $user_id    =  $user['id'];

    $add = "INSERT INTO `posts` (category_id, title, image, content, date, time, active,author_id) VALUES ('$category_id', '$title', '$image', '$content', '$date', '$time', '$active','$user_id')";
    $sql = mysqli_query($connect, $add);
    
    $run      = mysqli_query($connect, "SELECT * FROM `settings`");
    $site     = mysqli_fetch_assoc($run);
    $from     = $site['email'];
    $sitename = $site['sitename'];
    
    $run3 = mysqli_query($connect, "SELECT * FROM `posts` WHERE title='$title'");
    $row3 = mysqli_fetch_assoc($run3);
    $id3  = $row3['id'];
    
    
    
    echo '<meta http-equiv="refresh" content="0;url=posts.php">';
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
        <script>
            CKEDITOR.replace( 'content' );
        </script>
    </body>    
</html>