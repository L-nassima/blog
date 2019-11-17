
<?php
session_start(); 
require('fonctions.php');

$id = $_GET['id'];
$delet=deletComment($id);

header('Location:details.php');

?>

