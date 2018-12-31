<?php
	session_start();
?>


<?php 
	if(isset($_SESSION["status"]) && $_SESSION['status']=="korisnik" && isset($_POST['mod_id'])){
		$modid=$_POST['mod_id'];
		$kolicina=$_POST['kolicina'];
		
		$query="SELECT modeli WHERE mod_id =$modid";
		$result = mysqli_query($konekcija, $query);
		$row = mysqli_fetch_assoc($result);
		$modeli=$row['mod_naziv'];
		$cena=$row['mod_cena'];
		
    $query="INSERT INTO `mydb`.`stavke` (`stv_kolicina`, `stv_jedinicna_cena`, `mod_id`, `nar_id`) VALUES ('$kolicina', '$cena', '$modid', '1')";
	$result = mysqli_query($konekcija, $query);
	}
	
?>