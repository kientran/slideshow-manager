<?php 
/* This is where you would inject your sql into the database 
but we're just going to format it and send it back 
*/ 
require ('../pm-config.php');
include ('dbFacile.php');

$db = dbFacile::open($conf['db']['type'], $conf['db']['name'], $conf['db']['user'] , $conf['db']['password'], $conf['db']['host']);

foreach ($_GET['panelid'] as $position => $item) : 
    $sql = "UPDATE Panels SET panelorder = $position WHERE ID = $item"; 
    print_r ($sql); 
    $db->execute($sql);
endforeach; 

$db->close();
?>

