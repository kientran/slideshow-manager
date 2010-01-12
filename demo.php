<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
     xsi:schemaLocation="http://www.w3.org/MarkUp/SCHEMA/xhtml11.xsd"
     xml:lang="en" >

<head profile="http://gmpg.org/xfn/11">

  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <title>Slideshow with animated caption demo</title>
  <meta http-equiv="Content-Language" content="en-us" />

  <meta http-equiv="imagetoolbar" content="no" />
  <meta name="MSSmartTagsPreventParsing" content="true" />

  <meta name="description" content="Description" />
  <meta name="keywords" content="Keywords" />

  <meta name="author" content="Kien Tran" />

  <link rel="stylesheet" href="css/photo-slideshow-caption.css" type="text/css" media="screen" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.cycle.lite.js"></script>
  <script type="text/javascript" src="js/photo-slideshow-caption.js"></script>

</head>

<body>

<div id="container">
<div id="slideshow-box">

<a href="#" id="prev"></a>
<a href="#" id="next"></a>

<div id='slides'>
<?php

include('php/dbFacile.php');

$db = dbFacile::open('mysql', 'panel_manager', 'root', 'root', 'localhost');

$panels = $db->fetch('SELECT * FROM Panels WHERE active IS NOT FALSE ORDER BY panelorder');

foreach($panels as $panel) {
echo <<<SLIDE
    <div class='slide'>
        <a href="{$panel['linkurl']}">
            <img src="{$panel['photourl']}" alt="{$panel['photoalt']}" />
            <span class="title {$panel['bannercolor']}">{$panel['title']}
            <span class="subtitle">{$panel['subtitle']} &raquo; Read More</span></span>
        </a>
    </div>
SLIDE;

}

?>
</div>
</div>
</div>
</body>
</html>
