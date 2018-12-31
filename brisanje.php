<?php
		session_start();
		require("DB.php");
		
		if(isset($_GET["stv_id"])){
			$stv_id=$_GET["stv_id"];
			
			$query="DELETE FROM `mydb`.`stavke` WHERE `stv_id`='$stv_id'";
			mysqli_query($konekcija,$query);
		}
		header("location:dileri.php");
?>