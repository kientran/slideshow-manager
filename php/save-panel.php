<?php

//foreach( $_POST as $key => $value)
//    echo $key . $value;

require ('../pm-config.php');
include ('dbFacile.php');


$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);

$data['id'] = $_POST['id'];
$data['title'] = stripslashes($_POST['title']);
$data['subtitle'] = stripslashes($_POST['subtitle']);
$data['linkurl'] = $_POST['linkurl'];
$data['photourl'] = $_POST['photourl'];
$data['photoalt'] = $_POST['photoalt'];
$data['bannercolor'] = $_POST['bannercolor'];
$data['active'] = (array_key_exists('active',$_POST)) ? 1 : 0 ;

$rows = $db->update($data,'Panels','ID=?',array($_POST['id']));
$sql= "UPDATE Panel SET title='" . $_POST['title'] . 
    "',\n subtitle='" . $data['subtitle'] .
    "',\n photourl='" . $data['photourl'] .
    "',\n linkurl='" . $data['linkurl'] .
    "',\n photoalt='" . $data['photoalt'] .
    "',\n bannercolor='" . $data['bannercolor'] .
    "',\n active='" . $data['active'] .
    "'\n WHERE ID=" . $data['id'];

echo $sql;
$db->close();

?>
