<?php

//foreach( $_POST as $key => $value)
//    echo $key . $value;

require_once (ROOT . '/pm-config.php');
include (ROOT . '/php/dbFacile.php');


$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);

//$data['id'] = $_POST['id'];
$data['title'] = stripslashes($_POST['title']);
$data['subtitle'] = stripslashes($_POST['subtitle']);
$data['linkurl'] = $_POST['linkurl'];
$data['photourl'] = $_POST['photourl'];
$data['photoalt'] = $_POST['photoalt'];
$data['bannercolor'] = $_POST['bannercolor'];
$data['active'] = 0 ;

$rows = $db->insert($data,'Panels', array($_POST['id']));
$db->close();

echo "Copied";
?>
