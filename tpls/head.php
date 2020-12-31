<head>
    
    <?php
    $run  = mysqli_query($connect, "SELECT * FROM `settings`");
    $site = mysqli_fetch_assoc($run);
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $site['sitename'];?></title>
    <meta name="description" content="<?php echo $site['description'];?>"/>
    <meta name="keywords" content="<?php echo $site['keywords'];?>"/>
    <meta name="author" content="Dimitris Samios"/>      
    <meta name="robots" content="index, follow, all"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png" />

    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="https://bootswatch.com/3/flatly/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
    
</head>