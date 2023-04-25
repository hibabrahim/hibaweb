<?php 

$host='localhost';
$user2='root';
$pass='';
$db='alibaba';

$co = new PDO("mysql:host=$host;dbname=$db", $user2, $pass);
$sql = "UPDATE best_category  SET nb_visites='0' ";
$query=$co->prepare($sql);
$query->execute();
$etat = $query->rowCount();
header("Location: best_category.php");


?>