<?php 
require('fonctions.php');

$id=$_GET['id'];
deletPost($id);

header('Location: admin.php');

?>