<?php

//foreach( $_POST as $key => $value)
//    echo $key . $value;

require ('../pm-config.php');
include ('dbFacile.php');


$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);

//$data['id'] = $_POST['id'];

$rows = $db->delete('Panels', 'ID=?', array($_GET['id']));
$db->close();

echo "Panel deleted";
?>
