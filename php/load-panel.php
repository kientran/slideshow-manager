<?php

require ('../pm-config.php');
include ('dbFacile.php');

$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);

//echo 'SELECT * FROM Panels where ID='.$_GET['panelid'];
$panel = $db->fetchRow('SELECT * FROM Panels where ID='.$_GET['panelid']);

echo json_encode($panel);

$db->close();
?>
