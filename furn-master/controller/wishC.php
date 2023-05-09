<!DOCTYPE html>
<html>

<?php 

class wishC{


	function afficherwich_list(){
		$sql="SELECT * FROM wich_list  ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	} 
	   function supprimerwich_list($numse){
 $sql="DELETE  FROM wich_list WHERE `id_wich`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);

        }catch(Exception $e){
		die("erreur:".$e->getMessage());
     
        }
  
}


function Ajouterid_wich($ser){
$sql= "INSERT INTO `wich_list` VALUES (:id,:user,:article)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
	$recipesStatement->execute([   'id'=>$ser->getid_wish(), 

		'user' =>$ser->getid_user(),
		'article' =>$ser->getid_article(),
		




	]);
 }
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());

}

}
 function afficherwich1($numse){
		$sql="SELECT * FROM wich_list WHERE `id_user`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	} 
	function afficherwich_list_user(){
		$sql="SELECT * FROM user inner join wich_list on user.id=wich_list.id_user  ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}

}
?>
</html>
