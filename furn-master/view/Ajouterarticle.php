<?php 
session_start();

include_once '../config.php';
include_once '../controller/wishC.php';
include_once '../model/wish.php';
if(!isset($_POST['id'])||!isset($_POST['id_article']))
{
	echo "erreur de ";
}

$hotelc=new wishC();
$ser=new wish($_POST['id'],$_SESSION['id'],$_POST['id_article']);
$prod=$hotelc->Ajouterid_wich($ser);


header('location:http://localhost/furn-master/view/loggedin.php');

?>


