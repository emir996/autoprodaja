<?php

		session_start();
		require "DB.php";
		
		$query="select * from stavke left join modeli on modeli.mod_id=stavke.mod_id WHERE stavke.nar_id='".$_SESSION['nar_id']."'";
		
		
		$rez=mysqli_query($konekcija,$query);
		while($row=mysqli_fetch_assoc($rez)){
		
		
		$mod_id=$row['mod_id'];
		$cena=$row['mod_cena'];
		echo "<div id=".$mod_id.">"."<h1>".$row['mod_naziv']."</h1><h2>Kolicina: ".$row['stv_kolicina']."  automobila</h2><h2>".$row['mod_cena']."EUR</h2>"."<h4>".$row['mod_marka']."</h4><h4>".$row['mod_naziv']."</h4><h4>".$row['mod_godiste']." godiste</h4><h4>Garancija do ".$row['mod_garancija']."</h4><h4>".$row['mod_motor']." TDI</h4></div>"; 
		
		$stv_id=$row['stv_id'];
		
		echo "<a href='brisanje.php?stv_id=$stv_id'> OBRISI </a>";
		}
    	if(mysqli_num_rows($rez)==0){
			echo "<h1>Korpa je prazna</h1>"; 
		}
		
		
?>