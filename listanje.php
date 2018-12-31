<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
require "DB.php";


	$lista="SELECT * FROM modeli";
	$rez= mysqli_query($konekcija,$lista);
	while($row=mysqli_fetch_assoc($rez)){
		$mod_id=$row['mod_id'];
		echo "<div class='referenceLink' id=".$mod_id.">"."<img src=".$row['mod_slika'].">"."<h2>".$row['mod_naziv']."</h2>"."<h4>".$row['mod_cena']."</h4>"."<a href='jedan.php?mod_id=".$mod_id."'>Saznaj vise</a>"; 
		
		
		
		$query6="SELECT kkv_id FROM mydb.karakteristike_vrednosti ORDER BY kkv_id DESC";
		$result=mysqli_query($konekcija,$query6);
		$row = mysqli_fetch_assoc($result);
	
			
		
	
	}

	?>
<form action="listanje.php" method="POST">
</form>
</body>
</html>