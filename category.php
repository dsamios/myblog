<?php require_once "core/core.php"; ?>

<!DOCTYPE html>
<html>
    <!-- head -->
    <?php include_once "tpls/head.php"; ?>  
    <body>
        <!-- Top Menu -->
        <?php include_once "tpls/topmenu.php"; ?>
        <!-- Header -->
        <?php include_once "tpls/header.php"; ?>

        <?php
        $category_id = (int) $_GET['id'];
        $runq        = mysqli_query($connect, "SELECT * FROM `categories` WHERE id='$category_id'");
        $rw          = mysqli_fetch_assoc($runq);

        if (empty($category_id)) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit();
        }

        if (mysqli_num_rows($runq) == 0) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit();
        }

        $pageNum = 1;
        if (isset($_GET['page'])) {
            $pageNum = $_GET['page'];
        }
        if (!is_numeric($pageNum)) {
            echo '<meta http-equiv="refresh" content="0; url=blog.php">';
            exit();
        }

        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="alignleft col-md-12">
                        <div class="title-divider">
                            <h3>Blog - <?php echo $rw['category']; ?></h3>
                            <div class="divider-arrow"></div>
                        </div>
                        <?php echo getCategory($category_id,$pageNum); ?>
                     </section> 
			    </div>
                <!-- Sidebar -->
                <?php include_once "tpls/sidebar.php"; ?>
            </div>  
        </div>
          
        <!-- Footer -->
        <?php include_once "tpls/footer.php"; ?>    
    </body>
    <!-- Scripts -->
    <?php include_once "tpls/scripts.php"; ?> 
</html>