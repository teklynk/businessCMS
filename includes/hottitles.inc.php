<!-- Hot titles iframe -->
<?php
define('inc_access', TRUE);
include_once '../core/functions.php';
//$savedSearches = array("http://beacon.tlcdelivers.com:8080/list/dynamic/1921425/rss","http://beacon.tlcdelivers.com:8080/list/dynamic/200144044/rss");
//Get ?loc_id=1&rssurl=blah from iframe source url
$rssUrl = $_GET['rssurl'];
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Bootstrap Core CSS CDN -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Default template CSS - Do not remove-->
    <link rel="stylesheet" type="text/css" href="//<?php echo $_SERVER['HTTP_HOST'] ?>/css/default-style.min.css">
    <!-- jQuery CDN -->
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Core js file-->
    <script type="text/javascript" language="javascript" src="//<?php echo $_SERVER['HTTP_HOST'] ?>/js/functions.min.js"></script>
    <style>
        html, head, body {padding:0; margin:0; border: none; background: transparent; overflow: hidden;}
    </style>
</head>
<body>

        <div class="carousel slide hottitlesCarousel" data-ride="carousel" data-type="multi" data-interval="false" id="hottitlesCarousel">
            <div class="carousel-inner">
                <?php
                getHottitlesCarousel($rssUrl, 20, 2, 6, 12);
                ?>
            </div>
            <a class="left carousel-control" href="#hottitlesCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left icon-prev"></i></a>
            <a class="right carousel-control" href="#hottitlesCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right icon-next"></i></a>
        </div>
</body>
</html>