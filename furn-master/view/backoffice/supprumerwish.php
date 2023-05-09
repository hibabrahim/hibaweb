<?php 

include_once '../../config.php';
include_once '../../controller/wishC.php';


$hotelc=new wishC();

$prod=$hotelc->supprimerwich_list($_POST['id_wich']);


header('location:http://localhost/furn-master/view/backoffice/affichewich.php');

?>


