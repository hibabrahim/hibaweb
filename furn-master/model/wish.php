<?php
class wish{
	
private $id_wish;
private $id_user;
private $id_article;




public  function __construct($id_wish,$id_user,$id_article)
{
	$this->id_wish=$id_wish;
    $this->id_user=$id_user;
    $this->id_article=$id_article;
    
  
       
    

 


}





public  function getid_wish()
{
	return $this->id_wish;
}
public function getid_user()
{
	return $this->id_user;
}
public function getid_article()
{
	return $this->id_article;
}






}

?>