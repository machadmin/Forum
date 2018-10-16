<?php define("index", true); ?>
<?php include("baglan.php"); ?>
<?php session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<title>MachHub • HomePage</title>
			<link rel="stylesheet" href="css/sablon.css">
				<link rel="stylesheet" href="css/reset.css">
	</head>
	<body>
		<div class="genel">
			<div class="header">
				<h2><span style="color:red;">MachHub</span></h2>
				<div class="reklam">
				 <img src="images/reklam.gif" alt="">
				</div>
			</div>
			<div class="menu">
				<ul>
					<li><a href="index.php">Anasayfa</a></li>
					<?php
					
					$sayfa = $db->prepare("select * from ana_sayfalar order by sayfa_id desc");
					$sayfa->execute(array());
					$s = $sayfa->fetchALL(PDO::FETCH_ASSOC);
					$x = $sayfa->rowCount();
					
					if($x){
						foreach($s as $m){
							echo '<li><a href="?do=ana_sayfalar&id='.$m["sayfa_id"].'">'.$m["sayfa_adi"].'</a></li>';
						}
					}else{
						// Birşey yok ise boş kal
					}
					
					if(!$_SESSION){
						echo '<li><a href="?git=kayit">Kayıt Ol</a></li>';
					}
					
					?>
					<li><a href="?git=iletisim">İletişim</a></li>
					</ul>
					<form action="" method="post">
						<span><input type="text" name="ara" /><button type="submit">Ara</button></span>
					</form>
			</div>
			<div style="clear:both;"></div>
			<div class="content">
				<div class="sol">
					<?php
					
					$git = @$_GET["git"];
					switch($git){
						
						case "iletisim":
						include("pages/iletisim.php");
						break;
						
						case "ana_sayfalar":
						include("ana_sayfalar.php");
						break;
						
						case "kayit":
						include("kayit.php");
						break;
					}
					
					?>
					</div>
					<div class="sag">
						Sağ Taraf
						</div>
			</div>
			<div style="clear:both;"></div>
			<div class="footer">
				<h2>© Copyright 2018 © MachHub Technology</h2>
				</div>
			</div>
	</body>
</html>