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
                <article class="blog-post">
                    <?php 
                        $id = (int) $_GET['id'];
                        echo getPost($id);
                    ?>
                    <br />
                                        
                    <div class="title-divider">
                        <h3>Leave A Comment</h3>
                        <div class="divider-arrow"></div>
                    </div>

                    <form action="post.php?id=<?php echo $id; ?>" method="post">
                                <label for="name"><i class="fa fa-user"></i> Your Name:</label>
                                <input type="text" name="author" value="" class="form-control" required />
                                <br />

                                <label for="dontfill" style="display:none;">Don't fill:</label>
                                <input type="text" name="dontfill" value="" style="display:none;" />

                                <label for="input-message"><i class="fa fa-comment-o"></i> Comment:</label>
                                <textarea name="message" rows="10" class="form-control" required></textarea>
                                <br />
                                
                                <input type="submit" name="post" class="btn btn-primary btn-block" value="Post" />
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['post'])) {
                        
                        $comment = $_POST['message'];
                        $author  = $_POST['author'];
                        $spam    = $_POST['dontfill'];
                        
                        $date = date('d F Y');
                        $time = date('H:i');
                        
                        if (strlen($comment) < 2) {
                            echo '<div class="alert alert-danger">Your comment is too short</div>';
                        } else {
                            if (strlen($author) < 2) {
                                echo '<div class="alert alert-warning">Your name is too short</div>';
                            } else {
                                if ($spam) { // Honeypot - Stop spam bots
                                    exit("Spam Detected!");
                                } else {
                                    $runq = mysqli_query($connect, "INSERT INTO `comments` (post_id, `comment`,author, date, time) VALUES ('$row[id]', '$comment', '$author', '$date', '$time')");
                                    echo '<div class="alert alert-success">Your comment has benn successfully posted</div>';
                                }
                            }
                        }
                    }
                    ?>
                </article>
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