<html>
<head>

 <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
 <script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
 <script type="text/javascript" src="js/jquery.cycle.lite.js"></script>
<!--  <script type="text/javascript" src="js/slideshow-manager.js"></script>-->
<script type="text/javascript">

    $(document).ready(function() {
        $('#panellist').sortable({
            axis: 'y',
            cursor: 'move',
            update : function() {
                var order = $('#panellist').sortable('serialize');
                $('#info').load('process-sortable.php?'+order);
            }
        });
        $('#panellist li').click(function() {
            var panelidPrefix = 'panelid_';
            var panelidNum = this.id.substring(panelidPrefix.length);
            //$('#info').load('load-panel.php?panelid='+panelidNum);
            $.getJSON('php/load-panel.php?panelid='+panelidNum,
                function(data){
                    loadPreview(data);
                    $('#panelid').val(data['ID']);

                    $('#title').val(data['title']);
                    $('#subtitle').val(data['subtitle']);
                    $('#linkurl').val(data['linkurl']);

                    $('#photourl').val(data['photourl']);
                    $('#photoalt').val(data['photoalt']);

                    var $radios = $('input:radio[name=bannercolor]');
                    switch ( data['bannercolor'] )
                    {
                        case 'purple': $radios.filter('[value=purple]').attr('checked', true);
                            break;
                        case 'orange': $radios.filter('[value=orange]').attr('checked', true);
                            break;
                        case 'blue': $radios.filter('[value=blue]').attr('checked', true);
                            break;
                        case 'red': $radios.filter('[value=red]').attr('checked', true);
                            break;
                        case 'green': $radios.filter('[value=green]').attr('checked', true);
                            break;
                        default:
                            alert('Uh oh, unknown banner info');
                    }
                    if(data['active'] == '1') 
                        $("#active").attr('checked',true);
                    else
                        $("#active").attr('checked',false);
                    
            });
            
        });

        function loadPreview(data) {

                    $('#panel-title').html(data['title'] +
                        '<span id="panel-subtitle" class="subtitle">' +
                        data['subtitle'] + '&raquo; Read More</span>'
                    );

                    $('#panel-link').attr("href",data['linkurl']);

                    $('#panel-photo').attr("src",data['photourl']);
                    $('#panel-photo').attr("alt",data['photoalt']);

                    $('#panel-title').attr("class","title "+data['bannercolor']); 
        };

        $('#save').click(function() {
            var titleVal = $('#title').val();
            $.post('php/save-panel.php',
                $('#panelinfo').serialize(),
                function(data){
                $('#info').text(data);
            });
        });
    });

</script>

<link rel="stylesheet" href="css/slideshow-manager.css" type="text/css">
</head>
<body>

<?php

require ('pm-config.php');
include ('php/dbFacile.php');

$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);


$panels = $db->fetch('SELECT * FROM Panels ORDER BY panelorder');

$db->close();
?>

<div id="main">
<div id="panelpane">

<ul id="panellist">
<?php
foreach($panels as $panel) {

    $listitem = '<li class="active_' . $panel['active'] . '" id="panelid_' . $panel['ID'] . '">'; 
    $listitem .= $panel['title'] . '<br />';
    $listitem .= '</li>';
    echo $listitem;
}
?>

</ul>
</div>

<div id="previewpane">
<?php	echo <<<SLIDE
    <div class='slide'>
        <a id='panel-link' href="{$panel['linkurl']}">
            <img id='panel-photo' src="{$panel['photourl']}" alt="{$panel['photoalt']}" />
            <span id='panel-title' class="title {$panel['bannercolor']}">{$panel['title']}
            <span id='panel-subtitle' class="subtitle">{$panel['subtitle']} &raquo; Read More</span></span>
        </a>
    </div>
SLIDE;
?>

</div>

<div id="editpanel">
<form id='panelinfo'>
    <fieldset>
    <legend>Panel Information</legend>
    <input type="hidden" name="id" id="panelid" value="" />
    <ul>
        <li>
            <label for"title">Title</label>
            <input type="text" name="title" id="title"/>
        </li>

        <li>
            <label for"subtitle">Sub Title</label>
            <input type="text" name="subtitle" id="subtitle"/>
        </li>
        <li>
            <label for"linkurl">Link URL</label>
            <input type="text" name="linkurl" id="linkurl"/>
        </li>
        <li>
            <label for"photourl">Photo URL</label>
            <input type="text" name="photourl" id="photourl"/>
        </li>
        <li>
            <label for"photoalt">Photo Alt Text</label>
            <input type="text" name="photoalt" id="photoalt"/>
        </li>
    </ul>
    <label>&nbsp;</label>
    <input type="radio" name="bannercolor" value="purple" CHECKED />Purple
    <input type="radio" name="bannercolor" value="orange" />Orange
    <input type="radio" name="bannercolor" value="blue" />Blue
    <input type="radio" name="bannercolor" value="red" />Red
    <input type="radio" name="bannercolor" value="green" />Green
    <br />
    <label for"checkbox">Active</label>
    <input type="checkbox" name="active" id="active" />
    <br />
    <label>&nbsp;</label>
    <input type="button" id='save' name="save" value="Save">
    <input type="button" id='copy' name="copy" value="Copy">
    <input type="button" id='delete' name="delete" value="Delete">
    </fieldset>
</form>

</div>

<pre>
<div id="info">

</div>
</pre>

</div>

</body>
</html>
