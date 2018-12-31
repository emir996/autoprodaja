 <?php session_start(); 
	require "db.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="theme-color" content="#e84e1b">
<meta name="viewport" content="width=device-width">
<title>VOLKSWAGEN/Volkswagen</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="css/style.css">







</head>

<body>

<a name="top"></a>
	<header id="header">
    
    	<div id="headerTop">
        	<div class="wrapper">
            	<div id="headerTopLeft">
					<span><i class="fa fa-lg fa-phone"></i>&nbsp;&nbsp;&nbsp;000.000.000.000</span>
					<span><i class="fa fa-lg fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;volkswagen@gmail.rs</span>
                </div>
            	<div id="headerTopRight">
                	<a href="#" target="_blank"><i class="fa fa-lg fa-facebook-square"></i></a>
                	<a href="#" target="_blank"><i class="fa fa-lg fa-twitter-square"></i></a>
                	<a href="#" target="_blank"><i class="fa fa-lg fa-linkedin-square"></i></a>
                </div>
            </div>
        </div>
        
        <div id="headerBottom">
        	<div class="wrapper">
            
            	<div id="logo">
                	<a href="index.php">
                    	<img src="images/logo.png" alt="logo">
                    </a>
                </div>
                
                <nav id="nav">
                	<ul>
                    	<li><a href="login.php">LOG IN/REGISRACIJA</a></li>
                    	<li><a href="dileri.php">FIND A DEALER</a></li>
                    	<li><a href="modeli.php">MODELS</a></li>
                    	
                    	<li><a href="contact.php">CONTACT</a></li>
                    </ul>
                    <a href="#" id="respmenu" class="button"><i class="fa fa-lg fa-navicon"></i>&nbsp;&nbsp;&nbsp;&nbsp;Navigation</a>
                </nav>
            
            </div>
        </div>   
    
    </header><!-- kraj #header -->
    
    
    	
    
    <section id="central">
    

		<h1>Ubacivanje oglasa</h1>
		<form action ="" method="POST" enctype="multipart/form-data">
			<input type="text" name="marka" placeholder="Unesite Marku"required></input></br>
			<input type="text" name="naziv" placeholder="Unesite Naziv"required></input></br>
			<input type="number" name="cena" placeholder="Unesite cenu"required></input></br>
			<input type="text" name="opis" placeholder="Dodajte opis(ne mora)"></input></br>
			<input type="number" name="godiste" placeholder="godina proizvodnje"required></input></br>
			<input type="text" name="gorivo" placeholder="gorivo"required></input></br>
			<input type="number" name="broj_vrata" placeholder="Broj vrata" required></input></br>
			<input type="number" name="garancija" placeholder="Garancija" required></input></br>
			<select name="menjac" >
			<option>Izaberi menjac</option>
			<option value="A">Automacki</option>
			<option value="M">Manuelni</option>
			<option value="T">Tiptronik</option>
			</select></br>
			<select name="karoserija"></br>
			<option required>Izaberi Karoseriju</option>
			<option value="1" >Limuzina</option>
			<option value="2" >Karavan</option>
			<option value="3" >Kupe</option>
			<option value="4" >Kabrioler</option>
			<option value="4" >Dzip</option>
			</select></br>
			
			<select name="motor" ></br>
			<option required>Izaberi motor</option>
			<option value="1.2" >1.2cm3 70ks</option>
			<option value="1.6" >1.6cm3 105ks</option>
			<option value="1.9" >1.9cm3 131ks</option>
			<option value="2.0" >2.0cm3 160ks</option>
			</select></br>
	
			<select name="klima" >
			<option required>Izaberi klima</option>
			<option value="1" >Dvozonska</option>
			<option value="2" >Cetvorozonska</option>
			<option value="3" >Manuelna</option>
			</select></br>
			
			<span><select name="boja" >
			<option required>Izaberi boju</option>
			<option value="4" >Bela</option>
			<option value="5" >Crna</option>
			<option value="6" >Plava</option>
			<option value="7" >Crvena</option>
			</select></span></br>
			
			<select name="pogon" >
			<option required>Izaberi pogon</option>
			<option value="8" >prednji</option>
			<option value="9" >zadnji</option>
			<option value="10" >4motion</option>
			</select></br>
			
			<select name="klasa" ></br>
			<option required>Izaberi emisonu klasu motora</option>
			<option value="11" >Euro 1</option>
			<option value="12" >Euro 2</option>
			<option value="13" >Euro 3</option>
			<option value="14" >Euro 4</option>
			<option value="15" >Euro 5</option>
			<option value="16" >Euro 6</option>
			</select></br>
			
			<input type="checkbox" name="airbag">airbag</input></br>
			<input type="checkbox" name="servo_volan">Servo volan</input></br>
			<input type="checkbox" name="putni_racunar">Putni racunar</input></br>
			<input type="checkbox" name="siber">Siber</input></br>
			<input type="checkbox" name="alarm">alarm</input></br>
			<input type="checkbox" name="centralno_zakljucavanje">Centralno</input></br>
			
			<input type="file" name="file"/></br>
			
			<input type="submit" value="Postavi oglas"/>
		</form>
<?php
	
	if($_SESSION["ulogovan"]==true){
	
	if(isset($_POST["marka"])){
		$marka=$_POST["marka"];
		$naziv=$_POST["naziv"];
		$cena=$_POST["cena"];
		$opis=$_POST["opis"];
		$godiste=$_POST["godiste"];
		$gorivo=$_POST["gorivo"];
		$broj_vrata=$_POST["broj_vrata"];
		$garancija=$_POST["garancija"];
		$menjac=$_POST["menjac"];
		$motor=$_POST["motor"];
		
		$karoserija=$_POST["karoserija"];
		   
		 
		   $name = $_FILES['file']['name'];
				$target_dir = "newslike/";
				$target_file = $target_dir . basename($_FILES["file"]["name"]);
				
				move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

				 
		   
		  
		   
		   
		   
		   
		$airbag="0";
		$servo="0";
		$racunar="0";
		$siber="0";
		$alarm="0";
		$centralno="0";
		
		if($_POST["airbag"]==true){
			$airbag="1";
		}
		
		if($_POST["servo_volan"]==true){
			$servo="1";
		}
		
		if($_POST["putni_racunar"]==true){
			$racunar="1";
		}
		
		if($_POST["siber"]==true){
			$siber="1";
		}
		
		if($_POST["alarm"]==true){
			$alarm="1";
		}
		
		if($_POST["centralno_zakljucavanje"]==true){
			$centralno="1";
		}	
		
		

			$query="INSERT INTO `mydb`.`modeli` (`mod_marka`,`mod_naziv`, `mod_cena`, `mod_opis`,`kar_id`, `mod_godiste`, `mod_gorivo`, `mod_broj_vrata`, `mod_garancija`, `mod_menjac`, `mod_motor`, `mod_slika`) VALUES ('$marka','$naziv','$cena', '$opis','$karoserija', '$godiste', '$gorivo', '$broj_vrata', '$garancija', '$menjac', '$motor','". $target_dir.$name. "')";
			$result = mysqli_query($konekcija, $query);
		
		
			$query2k="INSERT INTO `mydb`.`oprema` (`opr_airbag`, `opr_servo_volan`, `opr_putni_racunar`, `opr_siber`, `opr_alarm`, `opr_centralno_zakljucavanje`) VALUES ('$airbag', '$servo', '$racunar', '$siber', '$alarm', '$centralno')";
			
			mysqli_query($konekcija, $query2k);
			
	}
			$query3="SELECT opr_id FROM mydb.oprema ORDER BY opr_id DESC";
			$result=mysqli_query($konekcija,$query3);
			$row = mysqli_fetch_assoc($result);
			
							$oprid =  $row['opr_id']; 
					
		
			$query4="SELECT mod_id FROM mydb.modeli  ORDER BY mod_id DESC";
			$result=mysqli_query($konekcija,$query4);
			$row = mysqli_fetch_assoc($result);
						$modid =  $row['mod_id'];
						
						$query5="INSERT INTO `mydb`.`opr_mod` (`opr_id`, `mod_id`) VALUES ('$oprid', '$modid')";
						mysqli_query($konekcija,$query5);
			
			
			$query6="SELECT kkv_id FROM mydb.karakteristike_vrednosti ORDER BY kkv_id DESC";
			$result=mysqli_query($konekcija,$query6);
			$row = mysqli_fetch_assoc($result);
		
						$kkvid =  $row['kkv_id'];

					
		
	
	}
			if(isset($_POST["klima"])){
				$nizkkv[]=$_POST["klima"];
				$nizkkv[]=$_POST["boja"];
				$nizkkv[]=$_POST["pogon"];
				$nizkkv[]=$_POST["klasa"];
			foreach($nizkkv as $kkv){
				$querykkv="INSERT INTO `mydb`.`kkv_mod` (`mod_id`, `kkv_id`) VALUES ('$modid', '$kkv');";
						mysqli_query($konekcija,$querykkv);
					
		}
	

	}
		$kveri=	"select * from karoserija";
		$result = mysqli_query($konekcija, $kveri);
		
		
		echo "<select>";
		while($row=mysqli_fetch_assoc($result)){
			
			echo"<option value=".$row['kar_id'].">".$row['kar_vrsta']."</option>";
				
		}
		echo "</select>";
	?>
	

	</section>
    
    
    
    <footer id="footer" class="negative">
    	<div class="wrapper">
    		
            <div class="footerBlock">
            	<h3>Consectetur adipisi</h3>
            	<p class="bold">Lorem ipsum dolor consectetur adipisicing elit. Doloribus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, optio, dolore, quibusdam molestiae voluptate cupiditate hic itaque mollitia deserunt maxime assumenda beatae illo delectus earum nisi voluptatibus iure dolor minima culpa enim expedita voluptas quod quis quia iste harum ducimus magni ad ipsam modi.</p>
            </div>
            <div class="footerBlock">
            	<h3>Delectus earum nisi</h3>
            	<p class="bold">Natus, excepturi, suscipit, voluptates quam veniam repudiandae nemo debitis qui illum</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, optio, dolore, quibusdam molestiae voluptate cupiditate hic itaque mollitia deserunt maxime assumenda beatae illo delectus earum nisi voluptatibus iure dolor minima culpa enim expedita voluptas quod quis quia iste harum ducimus magni ad ipsam modi.</p>
            </div>
            
            <div class="footerBlockR">
            	<img src="images/logo.png">
            </div>
            
    	</div>
        <div class="wrapper" id="footerBottom">
        	<a href="#top" class="button">back to top</a>
        	<p>Copyright @ Volkswagen // <a href="#">privacy</a> / <a href="#">cookie policy</a> </p>
        
        </div>
    </footer>
    

</body>
</html>
