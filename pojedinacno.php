<?php
require "DB.php";

if(isset($_GET['mod_id'])){
	$mod_id=$_GET['mod_id'];
	 $lista="SELECT * FROM modeli where mod_id=$mod_id";
	 $rez= mysqli_query($konekcija,$lista);
	 while($row=mysqli_fetch_assoc($rez)){
		
		echo "<div id=".$mod_id.">"."<h1>".$row['mod_naziv']."</h1></br>"."<h2>".$row['mod_cena']."</h2></br>"."<h2>".$row['mod_marka']."</h2></br><h2>".$row['mod_naziv']."</h2></br><h2>".$row['kar_id']."</h2></br><h2>".$row['mod_godiste']."godiste</h2></br><h2>".$row['mod_gorivo']."</h2></br><h2>".$row['mod_broj_vrata']."</h2></br><h2>".$row['mod_garancija']."</h2></br><h2>".$row['mod_menjac']."</h2></br><h2>".$row['mod_motor']."</h2></br><img src=".$row['mod_slika']. "></div>"; 
		
		 
		$kveri="SELECT * FROM mydb.kkv_mod
			left join karakteristike_vrednosti on kkv_mod.kkv_id = karakteristike_vrednosti.kkv_id
			where mod_id=$mod_id";
		$result=mysqli_query($konekcija,$kveri);
		
					while($row = mysqli_fetch_assoc($result)){
						$kkvid =  $row['kkv_id'];
						$vrednost=$row['kkv_vrednost'];
							echo "<div id=" . $kkvid . ">" . " <h2>". $vrednost ."</h2> </div>";
					
		 
		 
		}
		
		$query10="SELECT * FROM modeli left join opr_mod on modeli.mod_id=opr_mod.mod_id
				left join oprema on opr_mod.opr_id=oprema.opr_id where modeli.mod_id=$mod_id";
		$result=mysqli_query($konekcija,$query10);
		
		
		$row = mysqli_fetch_assoc($result);
						$modid =  $row['mod_id'];
						
							if($row['opr_airbag']==1){
								echo "<h2>AIR BAG</h2>";
							}
							if($row['opr_servo_volan']==1){
								echo "<h2>Servo Volan</h2>";
							}
							if($row['opr_putni_racunar']==1){
								echo "<h2>Putni Racunar</h2>";
							}
							if($row['opr_siber']==1){
								echo "<h2>Siber</h2>";
							}
							if($row['opr_alarm']==1){
								echo "<h2>Alarm</h2>";
							}
							if($row['opr_centralno_zakljucavanje']==1){
								echo "<h2>Centralno Zakljucavanje</h2>";
							}
							
		
		
	}
	
}
echo "<a href='promena.php?mod_id=$modid'>Promeni</a>"
?>
