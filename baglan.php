<?php

try{
	$host = "hostname";
	$dbname = "dbname";
	$kadi = "kadi";
	$sifre = "sifre";
	
	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$kadi","$sifre");
}catch(PDOException $hata){
	echo $hata->getMessage();
}

?>