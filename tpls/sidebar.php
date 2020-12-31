<aside id="sidebar" class="col-md-4">
    <div class="title-divider">
        <h3>Search</h3>
        <div class="divider-arrow"></div>
    </div>
    <section class="block-grey">
        <div class="block-light">
            <form action="search.php" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Type here to search..." name="q" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
            </form>
        </div>
    </section>
    <div class="title-divider">
        <h3>Categories</h3>
        <div class="divider-arrow"></div>
    </div>
    <section class="block-grey">
        <div class="block-light wrap15"><br />
            <ul class="list-group">
                <?php echo getSidebarCategories();?>                        
            </ul>
        </div>
    </section>
    <section class="block-grey">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#popular" data-toggle="tab"><i class="fa fa-fire"></i> Popular</a></li>
            <li><a href="#recent" data-toggle="tab"><i class="fa fa-clock-o"></i> Recent</a></li>
            <li><a href="#comments" data-toggle="tab"><i class="fa fa-comments"></i> Comments</a></li>
        </ul>
        <div class="tab-content">
            <div id="popular" class="tab-pane fade in active">
                <?php echo getPopularTab(); ?>                        
            </div>
            <div id="recent" class="tab-pane fade">
                <?php echo getRecentTab(); ?>                         
            </div>
            <div id="comments" class="tab-pane fade">
                <?php echo getCommentsTab(); ?>
            </div>
        </div>
    </section>
</aside>