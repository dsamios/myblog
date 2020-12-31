<?php 
require_once "lib/core.php"; 
$id   = (int) $_GET['id'];
$runq = mysqli_query($connect, "SELECT * FROM `messages` WHERE id='$id'");
mysqli_query($connect, "UPDATE `messages` set viewed='Yes' WHERE id='$id'");
$row = mysqli_fetch_assoc($runq);

if (empty($id)) {
    echo '<meta http-equiv="refresh" content="0; url=messages.php">';
}
if (mysqli_num_rows($runq) == 0) {
    echo '<meta http-equiv="refresh" content="0; url=messages.php">';
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
                            <h1 class="m-0">Message</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Message</li>
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
				  <center>
<?php
echo '
                                        <div class="form-actions">
											<a href="messages.php?id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a><br />
								        </div><br>
                                        <i class="fa fa-user"></i> Sender: <b>' . $row['name'] . '</b><br>
										<i class="fa fa-envelope-o"></i> E-Mail Address: <b>' . $row['email'] . '</b><br>
										<i class="fa fa-calendar-o"></i> Date: <b>' . $row['date'] . ' at ' . $row['time'] . '</b><br><hr>
										<i class="fa fa-file-text-o"></i> Message:<br><b>' . $row['content'] . '</b><br><hr>
                                        <h2>Reply to the message</h2>
                                        <a href="mailto:' . $row['email'] . '" class="btn btn-primary btn-block" target="_blank"><i class="fa fa-reply"></i> Reply</a>';
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
        <script>
            $(document).ready(function() {

                $('#dt-basic').dataTable( {
                    "responsive": true,
                    "language": {
                        "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                        }
                    }
                } );
            } );
        </script>
        <?php include_once "partials/scripts.php"; ?> 
    </body>    
</html>