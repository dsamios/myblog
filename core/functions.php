<?php

// Function gia na mikrenoume tous megalous titlous sto frontpage
function short_text($text, $length)
{
    $maxTextLenght = $length;
    $aspace        = " ";
    if (strlen($text) > $maxTextLenght) {
        $text = substr(trim($text), 0, $maxTextLenght);
        $text = substr($text, 0, strlen($text) - strpos(strrev($text), $aspace));
        $text = $text . '...';
    }
    return $text;
}

function getLatestPosts(){
    include "config.php";

    $latestPostsOutput = "";
    $posts  = mysqli_query($connect, "SELECT * FROM `postdetails` WHERE active='Yes' ORDER BY id DESC LIMIT 10");
    $postsCount = mysqli_num_rows($posts);
    if ($postsCount <= 0) {
        $latestPostsOutput = $latestPostsOutput . '<br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($posts)) {
            $post_id = $row['id'];
            $query   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $count   = mysqli_num_rows($query);
            $latestPostsOutput = $latestPostsOutput .  '
                    <post class="blog-post col-md-6">
                        <div class="block-grey">
                            <div class="block-light">
                                <a href="post.php?id=' . $row['id'] . '"><img src="' . $row['image'] . '" height="200" width="100%" /></a>
                                    <div class="wrapper">
                                        <h2 class="post-title"><a href="post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>
                                        <a href="post.php?id=' . $row['id'] . '#comments" class="blog-comments"><i class="fa fa-comments"></i> ' . $count . '</a>
                                        <p><i class="fa"></i> Category: ' . $row['category'] . '</p>   
                                        <p><i class="fa fa-clock-o"></i> ' . $row['date'] . ' at ' . $row['time'] . '</p>
                                    </div>
                            </div>
                        </div>
                    </post>
                ';
        }
    }
    return $latestPostsOutput;    
}

function getSidebarCategories(){

    include "config.php";

    $categoriesOutput = "";

    $query1 = mysqli_query($connect, "SELECT * FROM `categories`");
    while ($row = mysqli_fetch_assoc($query1)) {
        $category_id = $row['id'];
        $query2    = mysqli_query($connect, "SELECT * FROM `posts` WHERE category_id = '$category_id' and active='Yes'");
        $count    = mysqli_num_rows($query2);
        $categoriesOutput = $categoriesOutput . '
            <li class="list-group-item"><span class="badge">' . $count . '</span><a href="category.php?id=' . $row['id'] . '"><i class="fa fa-arrow-right""></i>&nbsp; ' . $row['category'] . '</a></li>
		';
    }

    return $categoriesOutput;
}


function getPopularTab(){

    include "config.php";

    $popularOutput = "";

    $query1   = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY views DESC LIMIT 4");
    $count1 = mysqli_num_rows($query1);
    if ($count1 <= 0) {
        $popularOutput = $popularOutput . '<br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($query1)) {
            $post_id = $row['id'];
            $query2   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $count2    = mysqli_num_rows($query2);
            $popularOutput=$popularOutput .'
                <div class="media">
                    <div class="media-left">
                        <a href="post.php?id=' . $row['id'] . '"><img class="media-object" src="' . $row['image'] . '" style="width: 64px; height: 64px;"></a>
                    </div>
                    <div class="media-body">
                        <a href="post.php?id=' . $row['id'] . '"><h4 class="media-heading">' . $row['title'] . '</h4></a><br />
                        <i class="fa fa-clock-o"></i> ' . $row['date'] . ' at ' . $row['time'] . '<br />
                        <i class="fa fa-comments"></i> Comments: ' . $count2 . '
                    </div>
                </div><hr />
            ';
        }
    }

    return $popularOutput;
}

function getRecentTab() {
    include "config.php";

    $recentOutput = "";

    $query1   = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY id DESC LIMIT 4");
    $count = mysqli_num_rows($query1);
    if ($count <= 0) {
        echo '<br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($query1)) {
            $post_id = $row['id'];
            $query2   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $count2    = mysqli_num_rows($query2);
            $recentOutput=$recentOutput .'
                <div class="media">
                    <div class="media-left">
                        <a href="post.php?id=' . $row['id'] . '"><img class="media-object" src="' . $row['image'] . '" style="width: 64px; height: 64px;"></a>
                    </div>
                    <div class="media-body">
                        <a href="post.php?id=' . $row['id'] . '"><h4 class="media-heading">' . $row['title'] . '</h4></a><br />
                        <i class="fa fa-clock-o"></i> ' . $row['date'] . ' at ' . $row['time'] . '<br />
                        <i class="fa fa-comments"></i> Comments: ' . $count2 . '
                    </div>
                </div><hr />
            ';
        }
    }

    return $recentOutput;
}

function getCommentsTab() {
    include "config.php";

    $commentOutput = "";
    
    $query = mysqli_query($connect, "SELECT * FROM `comments` WHERE approved='Yes' ORDER BY `id` DESC LIMIT 4");
    $cmnts = mysqli_num_rows($query);
    if ($cmnts == "0") {
        $commentOutput=$commentOutput ."Δεν υπάρχουν διαθέσιμα σχόλια.";
    } else {
        while ($row = mysqli_fetch_array($query)) {
            $query2 = mysqli_query($connect, "SELECT * FROM `posts` WHERE id='$row[post_id]'");
            while ($row2 = mysqli_fetch_array($query2)) {
                $commentOutput=$commentOutput . '				
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="' . $row['avatar'] . '" style="width: 64px; height: 64px;">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">' . $row['author'] . '</h4></a><br />
                            <i class="fa fa-clock-o"></i> ' . $row['date'] . ' at ' . $row['time'] . '<br />
                            <i class="fa fa-comments"></i> Post: <a href="post.php?id=' . $row['post_id'] . '#comments">' . $row2['title'] . '</a>
                        </div>
                    </div><hr />
                ';
            }
        }
    }

    return $commentOutput;
}

function getAboutFooter(){
    include "config.php";

    $output = "";
    $query = mysqli_query($connect, "SELECT * FROM `settings`");
    while ($row = mysqli_fetch_assoc($query)) {
        $output =    $output .' '. $row['description'];
    }
    return $output;
}

function getRecentPostsFooter(){
    include "config.php";

    $output = "";

    $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY id DESC LIMIT 2");
    $count = mysqli_num_rows($run);
    if ($count <= 0) {
        $output = $output . '<br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($run)) {
            $post_id = $row['id'];
            $runq3   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $uNum    = mysqli_num_rows($runq3);
            $output =    $output .'
                <div class="media well">
                    <div class="media-left">
                        <a href="post.php?id=' . $row['id'] . '"><img class="media-object" src="' . $row['image'] . '" style="width: 64px; height: 64px;"></a>
                    </div>
                    <div class="media-body">
                        <a href="post.php?id=' . $row['id'] . '"><h4 class="media-heading">' . $row['title'] . '</h4></a><br />
                        <i class="fa fa-clock-o"></i> ' . $row['date'] . ' at ' . $row['time'] . '
                    </div>
                </div>
            ';
        }
    }
    return $output;    
}

function getPost($id){
    include "config.php";

    $output = "";

    $id = (int) $_GET['id'];

    if (empty($id)) {
        $output = $output . '<meta http-equiv="refresh" content="0; url=blog.php">';
    }

    $runq = mysqli_query($connect, "SELECT * FROM `postdetails` WHERE id='$id'");
    if (mysqli_num_rows($runq) == 0) {
        $output = $output . '<meta http-equiv="refresh" content="0; url=blog.php">';
    }

    mysqli_query($connect, "UPDATE `posts` SET views = views + 1 WHERE active='Yes' and id='$id'");
    $row         = mysqli_fetch_assoc($runq);
    $post_id     = $row['id'];
    $runq3       = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
    $uNum        = mysqli_num_rows($runq3);
    $output = $output .'        
        <div class="block-grey">
            <div class="block-light">
                <div class="wrapper-img">
                    <img src="' . $row['image'] . '" width="100%" height="260"/>
                </div>
                <div class="wrapper">
                    <h2 class="post-title">' . $row['title'] . '</h2>
                    <p> Author: ' . $row['username'] . ' | Category: ' . $row['category'] . '  </p>
                    
                    <hr />
                    ' . html_entity_decode($row['content']) . '
                    <hr>
                    <p>
                        <i class="fa fa-calendar"></i> Date: ' . $row['date'] . '&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-comments-o"></i> Comments: <a href="#comments">' . $uNum . '</a>
                    </p>
                    <hr>

                    <div class="title-divider" id="comments">
                        <h3><i class="fa fa-comments-o"></i> Comments - ' . $uNum . '</h3>
                        <div class="divider-arrow"></div>
                    </div>                
    ';
    $q     = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$row[id]' AND approved='Yes' ORDER BY id DESC");
    $count = mysqli_num_rows($q);
    if ($count <= 0) {
        $output = $output . '<div class="alert alert-info">There are no comments yet</div>';
    } else {
        while ($comment = mysqli_fetch_array($q)) {
            
            $output = $output . '
            <article class="row">
                <div class="col-md-2">
                <figure class="thumbnail">
                    <img class="img-responsive" src="' . $comment['avatar'] . '" />
                </figure>
                </div>
                <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <header class="text-left">
                        <div class="comment-user"><i class="fa fa-user"></i> ' . $comment['author'] . '</div>
                        <time class="comment-date"><i class="fa fa-clock-o"></i> ' . $comment['date'] . ' at ' . $comment['time'] . '</time>
                    </header><hr />
                    <div class="comment-post">
                        <p>
                        ' . $comment['comment'] . '
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </article>
        ';
        }
    }
    return $output;   
}

function getBlog(){
    include "config.php";

    $output = "";
    
    $postsperpage = 6;

    $pageNum = 1;
    if (isset($_GET['page'])) {
        $pageNum = $_GET['page'];
    }
    if (!is_numeric($pageNum)) {
        $output = $output . '<meta http-equiv="refresh" content="0; url=blog.php">';
        exit();
    }
    $rows  = ($pageNum - 1) * $postsperpage;

    $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' ORDER BY id DESC LIMIT $rows, $postsperpage");
    $count = mysqli_num_rows($run);
    if ($count <= 0) {
        $output = $output . '<br><br><br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($run)) {
            $post_id = $row['id'];
            $runq3   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $uNum    = mysqli_num_rows($runq3);
            $output = $output . '
                <article class="blog-post">
                    <div class="block-grey">
                        <div class="block-light">
                            <div class="wrapper-img">
                                <center><a href="post.php?id=' . $row['id'] . '">
                                <img src="' . $row['image'] . '" width="100%" height="260" /></a></center>
                            </div>
                            <div class="wrapper">
                                <h2 class="post-title"><a href="post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2><hr />
                                <p>' . html_entity_decode(short_text($row['content'], 800)) . '</p><hr />
                                <p>
                                    <i class="fa fa-calendar"></i> Date: ' . $row['date'] . '&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-comments-o"></i> Comments: <a href="post.php?id=' . $row['id'] . '#comments">' . $uNum . '
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            ';
        }
        
        $query   = "SELECT COUNT(id) AS numrows FROM posts WHERE active='Yes'";
        $result  = mysqli_query($connect, $query);
        $row     = mysqli_fetch_array($result);
        $numrows = $row['numrows'];
        $maxPage = ceil($numrows / $postsperpage);
        
        $pagenums = '';
        
        $output = $output . '<center>';
        
        for ($page = 1; $page <= $maxPage; $page++) {
            if ($page == $pageNum) {
                $pagenums .= "<a href='?page=$page' class='btn btn-primary'>$page</a> ";
            } else {
                $pagenums .= "<a href=\"?page=$page\" class='btn btn-default'>$page</a> ";
            }
        }
        
        if ($pageNum > 1) {
            $page     = $pageNum - 1;
            $previous = "<a href=\"?page=$page\" class='btn btn-default'><i class='fa fa-arrow-left'></i> Previous</a> ";
            
            $first = "<a href=\"?page=1\" class='btn btn-default'><i class='fa fa-arrow-left'\></i> <i class='fa fa-arrow-left'></i> First</a> ";
        } else {
            $previous = ' ';
            $first    = ' ';
        }
        
        if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = "<a href=\"?page=$page\" class='btn btn-default'><i class='fa fa-arrow-right'></i> Next</a> ";
            
            $last = "<a href=\"?page=$maxPage\" class='btn btn-default'><i class='fa fa-arrow-right'></i>  <i class='fa fa-arrow-r'></i> Last</a> ";
        } else {
            $next = ' ';
            $last = ' ';
        }
        
        $output = $output . $first . $previous . $pagenums . $next . $last;
        
        $output = $output . '</center>';
        
    }
    return $output;    
}

function getCategory($category_id,$pageNum){
    include "config.php";

    $output = "";
    
    $postsperpage = 6;
    

    $rows  = ($pageNum - 1) * $postsperpage;
    $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE category_id='$category_id' and active='Yes' ORDER BY id DESC LIMIT $rows, $postsperpage");
    $count = mysqli_num_rows($run);
    if ($count <= 0) {
        $output = $output . '<br><br><br><center>Δεν υπάρχουν διαθέσιμα άρθρα.</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($run)) {
            $post_id = $row['id'];
            $runq3   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
            $uNum    = mysqli_num_rows($runq3);
            $output = $output . '
                        <article class="blog-post">
                            <div class="block-grey">
                                <div class="block-light">
                                    <div class="wrapper-img">
                                        <center><a href="post.php?id=' . $row['id'] . '">
                                        <img src="' . $row['image'] . '" width="100%" height="260" /></a></center>
                                    </div>
                                    <div class="wrapper">
                                        <h2 class="post-title"><a href="post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2><hr />
                                        <p>' . html_entity_decode(short_text($row['content'], 800)) . '</p><hr />
                                        <p>
                                            <i class="fa fa-calendar"></i> Date: ' . $row['date'] . '&nbsp;&nbsp;&nbsp;
                                            <i class="fa fa-comments-o"></i> Comments: <a href="post.php?id=' . $row['id'] . '#comments">' . $uNum . '
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
    ';
        }
        
        $query   = "SELECT COUNT(id) AS numrows FROM posts WHERE category_id='$category_id' and active='Yes'";
        $result  = mysqli_query($connect, $query);
        $row     = mysqli_fetch_array($result);
        $numrows = $row['numrows'];
        $maxPage = ceil($numrows / $postsperpage);
        
        $pagenums = '';
        
        $output = $output . '<center>';
        
        for ($page = 1; $page <= $maxPage; $page++) {
            if ($page == $pageNum) {
                $pagenums .= "<a href='?id=$category_id&page=$page' class='btn btn-primary'>$page</a> ";
            } else {
                $pagenums .= "<a href=\"?id=$category_id&page=$page\" class='btn btn-default'>$page</a> ";
            }
        }
        
        if ($pageNum > 1) {
            $page     = $pageNum - 1;
            $previous = "<a href=\"?id=$category_id&page=$page\" class='btn btn-default'><i class='fa fa-arrow-left'></i> Previous</a> ";
            
            $first = "<a href=\"?id=$category_id&page=1\" class='btn btn-default'><i class='fa fa-arrow-left'\></i> <i class='fa fa-arrow-left'></i> First</a> ";
        } else {
            $previous = ' ';
            $first    = ' ';
        }
        
        if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = "<a href=\"?id=$category_id&page=$page\" class='btn btn-default'><i class='fa fa-arrow-right'></i> Next</a> ";
            
            $last = "<a href=\"?id=$category_id&page=$maxPage\" class='btn btn-default'><i class='fa fa-arrow-right'></i>  <i class='fa fa-arrow-r'></i> Last</a> ";
        } else {
            $next = '';
            $last = '';
        }
        
        $output = $output . $first . $previous . $pagenums . $next . $last;
        
        $output = $output .'</center>';
        
    }

    return $output;  
}

function getSearch(){
    include "config.php";

    $output = "";

    if ($_GET['q']) {
        $word = $_GET['q'];
        
        if (strlen($word) < 2) {
            $output = $output . '<div class="alert alert-danger">Enter at least 2 characters to search</div>';
        } else {
            
            $sql    = "SELECT * FROM posts WHERE active='Yes' and title LIKE '%$word%' ORDER BY id DESC";
            $result = mysqli_query($connect, $sql);
            $row    = mysqli_fetch_assoc($result);
            $count  = mysqli_num_rows($result);
            if ($count == 0) {
                $output = $output . '<div class="alert alert-info">No results found</div>';
            } else {
                
                $output = $output . '<div class="alert alert-success">'.$count.' results found</div>';
                
                $postsperpage = 6;
                
                $pageNum = 1;
                if (isset($_GET['page'])) {
                    $pageNum = $_GET['page'];
                }
                if (!is_numeric($pageNum)) {
                    $output = $output . '<meta http-equiv="refresh" content="0; url=blog.php">';
                    exit();
                }
                $rows = ($pageNum - 1) * $postsperpage;
                
                $run   = mysqli_query($connect, "SELECT * FROM `posts` WHERE active='Yes' and title LIKE '%$word%' ORDER BY id DESC LIMIT $rows, $postsperpage");
                $count = mysqli_num_rows($run);
                if ($count <= 0) {
                    $output = $output . '<br><br><br><center>There are no published posts</center><br>';
                } else {
                    while ($row = mysqli_fetch_assoc($run)) {
                        $post_id = $row['id'];
                        $runq3   = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id='$post_id' AND approved='Yes'");
                        $uNum    = mysqli_num_rows($runq3);
                        $output = $output . '
                        <article class="blog-post">
                            <div class="block-grey">
                                <div class="block-light">
                                    <div class="wrapper-img">
                                        <center><a href="post.php?id=' . $row['id'] . '">
                                        <img src="' . $row['image'] . '" width="100%" height="260" /></a></center>
                                    </div>
                                    <div class="wrapper">
                                        <h2 class="post-title"><a href="post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2><hr />
                                        <p>' . html_entity_decode(short_text($row['content'], 800)) . '</p><hr />
                                        <p>
                                            <i class="fa fa-calendar"></i> Date: ' . $row['date'] . '&nbsp;&nbsp;&nbsp;
                                            <i class="fa fa-comments-o"></i> Comments: <a href="post.php?id=' . $row['id'] . '#comments">' . $uNum . '
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
    ';
                    }
                    
                    $query   = "SELECT COUNT(id) AS numrows FROM posts WHERE active='Yes' and title LIKE '%$word%'";
                    $result  = mysqli_query($connect, $query);
                    $row     = mysqli_fetch_array($result);
                    $numrows = $row['numrows'];
                    $maxPage = ceil($numrows / $postsperpage);
                    
                    $pagenums = '';
                    
                    $output = $output . '<center>';
                    
                    for ($page = 1; $page <= $maxPage; $page++) {
                        if ($page == $pageNum) {
                            $pagenums .= "<a href='?q=$word&page=$page' class='btn btn-primary'>$page</a> ";
                        } else {
                            $pagenums .= "<a href=\"?q=$word&page=$page\" class='btn btn-default'>$page</a> ";
                        }
                    }
                    
                    if ($pageNum > 1) {
                        $page     = $pageNum - 1;
                        $previous = "<a href=\"?q=$word&page=$page\" class='btn btn-default'><i class='fa fa-arrow-left'></i> Previous</a> ";
                        
                        $first = "<a href=\"?q=$word&page=1\" class='btn btn-default'><i class='fa fa-arrow-left'\></i> <i class='fa fa-arrow-left'></i> First</a> ";
                    } else {
                        $previous = ' ';
                        $first    = ' ';
                    }
                    
                    if ($pageNum < $maxPage) {
                        $page = $pageNum + 1;
                        $next = "<a href=\"?q=$word&page=$page\" class='btn btn-default'><i class='fa fa-arrow-right'></i> Next</a> ";
                        
                        $last = "<a href=\"?q=$word&page=$maxPage\" class='btn btn-default'><i class='fa fa-arrow-right'></i>  <i class='fa fa-arrow-r'></i> Last</a> ";
                    } else {
                        $next = ' ';
                        $last = ' ';
                    }
                    
                    $output = $output . $first . $previous . $pagenums . $next . $last;
                    
                    $output = $output . '</center>';
                    
                }
            }
        }
    }

    return $output;    
}

function getGallery(){
    include "config.php";

    $output = "";

    $run   = mysqli_query($connect, "SELECT * FROM `gallery` WHERE active='Yes' ORDER BY id DESC");
    $count = mysqli_num_rows($run);
    if ($count <= 0) {
        $output = $output . '<br><br><br><center>There are no uploaded images</center><br>';
    } else {
        while ($row = mysqli_fetch_assoc($run)) {
            $output = $output . '
                <div data-toggle="modal" data-target="#' . $row['id'] . '" class="col-md-4">
                <div class="well">
                    <figure>
                        <figcaption><h4>' . $row['title'] . '</h4></figcaption>
                        <img src="' . $row['image'] . '" width="100%" height="210px" />
                    </figure>
                </div>
                </div>
                
                <div class="modal fade" id="' . $row['id'] . '" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span><i class="fa fa-window-close"></i> </span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">' . $row['title'] . '</h4>
                    </div>
                    <div class="modal-body">
                        <img src="' . $row['image'] . '" width="100%" height="auto" /><br /><br />
                        ' . $row['description'] . '
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                    </div>
                </div>
                </div>
    ';
        }
    }

    return $output;    
}