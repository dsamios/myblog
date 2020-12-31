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
                            <h3>About</h3>
                            <div class="divider-arrow"></div>
                        </div>
                        <div class="block-grey">
                            <div class="block-light wrap15">
                                <?php
                                $run = mysqli_query($connect, "SELECT * FROM `about` WHERE id=1");
                                $row = mysqli_fetch_assoc($run);
                                echo html_entity_decode($row['about']);
                                ?>
                            </div>
                        </div>
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