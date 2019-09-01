<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/fullscreen.css">
    <link rel="stylesheet" href="assets/css/share.css">
    <link rel="stylesheet" href="assets/css/thumbs.css">
    
    <style>
        body{
            margin:0px;
            padding:0px;
            background:#ccc;
        }
        .thumbnails{
            width:30%;
            float:left;
            margin:10px;
            background:#fff;
            padding:20px;
            box-sizing:border-box;
        }
        .thumbnails img{
            width:100%;
            height:auto;
        }
        .header h1{
            float:left;
            overflow:hidden;
        }
        .header a{
            float:right;
            overflow:hidden;
            margin-top:25px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
      <h1>Image Gallary</h1>
      <a class="btn btn-success" href="index.php" role="button">Back</a>
      
      </div>
    </div>
    <div class="container">
      <?php 
        $dir = glob('images/{*.jpg,*.png}',GLOB_BRACE);
        foreach($dir as $value){
      ?>
      <div class="thumbnails">
      <a href="<?php echo $value; ?>" data-fancybox="images" data-width="2048" data-height="1365">
    <img src="<?php echo $value; ?>" alt="">
    </a>
        
      </div>
      
      <?php } ?>
    </div>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/media.js"></script>
    <script src="assets/js/share.js"></script>
    <script src="assets/js/hash.js"></script>
    <script src="assets/js/core.js"></script>
    <script src="assets/js/fullscreen.js"></script>
    <script src="assets/js/guestures.js"></script>
    <script src="assets/js/slideshow.js"></script>
    <script src="assets/js/thumbs.js"></script>
    <script src="assets/js/wheel.js"></script>
</body>
</html>