<div class="container">
    <div class="row">
        <div class="col-md-8">
            <section class="alignleft col-md-12">
                    <div class="title-divider">
                        <h3>Latest posts</h3>
                        <div class="divider-arrow"></div>
                    </div>
                    <?php echo getLatestPosts(); ?>						
            </section>
            <section class="alignleft col-md-12">
                <a href="blog.php" class="btn btn-primary btn-block"><i class="fa fa-arrow-circle-o-right"></i> See All</a>
            </section>					
        </div>

        <!-- Sidebar -->
        <?php include_once "sidebar.php"; ?>  
        
    </div>
</div>