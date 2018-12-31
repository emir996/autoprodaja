<?php
	
	require('DB.php');
	session_start();
	// If buyer is logged in and GET param is sent.
	 
	if(isset($_SESSION["status"]) && $_SESSION["status"]=="korisnik" && isset($_POST['mod_id']))
	{
		
		$modid = $_POST['mod_id'];	
		$kolicina = $_POST['kolicina'];
		$stvid = $_SESSION['stv_id'];
		


		$query="SELECT * FROM proizvodi WHERE mod_id = $modid";
		$result = mysqli_query($konekcija, $query);
		$row = mysqli_fetch_assoc($result);
		$modnaziv=$row['mod_naziv'];
		$modcena=$row['mod_cena'];
		
		
		$query="INSERT INTO `mydb`.`stavke` (`stv_kolicina`, `stv_jedinicna_cena`, `mod_id`, `nar_id`) VALUES ('$kolicina', '$modcena', '$modid', '')";
		mysqli_query($connection, $query);	
		
		header("Location: korpa.php");
		
		

	}
	
				
?>