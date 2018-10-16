<?php

try{
	$host = "localhost";
	$dbname = "";
	$kadi = "root";
	$sifre = "";
	
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$kadi","$sifre");
}catch(PDOException $hata){
	echo $hata->getMessage();
}

?>