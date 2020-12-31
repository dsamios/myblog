<?php 
require_once "lib/core.php"; 
if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $del = mysqli_query($connect, "DELETE from messages where id = '$id'");
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
                            <h1 class="m-0">Messages</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
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
              <h4 class="box-header round-top">Messages</h4>         
              <div class="box-container-toggle">
                  <div class="box-content">
<?php
$query = mysqli_query($connect, "SELECT * FROM messages ORDER by id DESC");
$count = mysqli_num_rows($query);
if ($count <= 0) {
    echo '<br /><br /><center>No sent messages</center><br /><br />';
} else {
    echo '
                    <table class="table table-striped table-bordered" id="dt-basic">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>E-Mail</th>
                                  <th>Date</th>
								  <th>Viewed</th>
								  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '
                            <tr>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['email'] . '</td>
								<td>' . $row['date'] . ' at ' . $row['time'] . '</td>
								<td>' . $row['viewed'] . '</td>
                                <td>
                                    <a class="btn btn-success" href="read_message.php?id=' . $row['id'] . '">
                                        <i class="fa fa-search"></i>
                                        View
                                    </a>
                                    <a class="btn btn-danger" href="?id=' . $row['id'] . '">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
';
    }
    echo '
                          </tbody>
                     </table>
';
}
?>
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