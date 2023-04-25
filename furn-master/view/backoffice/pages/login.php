<?php

$host='localhost'; 
$user2='root';
$pass='';
$occ=0; 
$db='alibaba'; 
$login=$_POST['login'];
$password=$_POST['password'];
echo $login.$password;
$co=new PDO("mysql:host=$host;dbname=$db",$user2,$pass);
$sql="SELECT * FROM login WHERE login='$login' "; 
$query=$co->prepare($sql); 
$query->execute(); 
$occ=0; 
if ($data=$query->fetch()) 
{
if($data['role']=='admin')
{
if($data['password']==$password)
{
header("location: stats.html");	
$occ++;
}
else
{
header("location: mylogin.html");	
}	
if($occ==0)
{
header("location: mylogin.html");		
}
}
else
{
	if($data['password']==$password)
{
header("location: ../../electro/stats.html");	
$occ++;
}
else
{
header("location: mylogin.html");	
}	
if($occ==0)
{
header("location: mylogin.html");		
}
}
}

?>