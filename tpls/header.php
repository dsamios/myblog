<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <a href="index.php">
                    <h1 style="font-size: 50px; vertical-align: middle;">
                        <?php echo $site['sitename'];?>
                    </h1>
                </a>
                <br />
            </div>
            <div class="col-md-6">
                <!-- extra -->
            </div>
        </div>		
        <br />
        
        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
<?php
                        $runq = mysqli_query($connect, "SELECT * FROM `menu`");
                        while ($row = mysqli_fetch_assoc($runq)) {
                            if ($row['path'] == 'blog.php') {
                                echo '<li class="dropdown';
                                if (basename($_SERVER['SCRIPT_NAME']) == 'blog.php' || basename($_SERVER['SCRIPT_NAME']) == 'category.php') {
                                    echo ' active';
                                }
                                echo '"><a href="blog.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa ' . $row['fa_icon'] . '"></i> ' . $row['page'] . ' <span class="caret"></span></a><ul class="dropdown-menu">';
                                $categories = mysqli_query($connect, "SELECT * FROM `categories`");
                                while ($rawCategories = mysqli_fetch_array($categories)) {
                                    echo '<li><a href="category.php?id=' . $rawCategories['id'] . '">' . $rawCategories['category'] . '</a></li>';
                                }
                                echo '</ul></li>';
                            } else {
                                echo '<li ';
                                if (basename($_SERVER['SCRIPT_NAME']) == $row['path']) {
                                    echo 'class="active"';
                                }
                                echo '><a href="' . $row['path'] . '"><i class="fa ' . $row['fa_icon'] . '"></i> ' . $row['page'] . '</a></li>';
                            }
                        }
?>
                    </ul>
                </div>
            </div>
        </nav>		
    </div>
</header>