<?php

//require_once(ROOT . '/pm-config.php');
include (ROOT . '/php/dbFacile.php');

$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);


$panels = $db->fetch('SELECT * FROM Panels ORDER BY panelorder');

$db->close();

foreach($panels as $panel) {

    $listitem = '<li class="active_' . $panel['active'] . '" id="panelid_' . $panel['ID'] . '">'; 
    $listitem .= $panel['ID'] . ' ' . $panel['title'];
    $listitem .= '</li>';
    echo $listitem;
}

?>

