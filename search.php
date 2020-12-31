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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="alignleft col-md-12">
                        <div class="title-divider">
                            <h3>Search</h3>
                            <div class="divider-arrow"></div>
                        </div>
                        <?php echo getSearch(); ?>
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