<!doctype html>
<?php
	session_start();
?>
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
                    	<li><a href="dileri.php">KORPA</a></li>
                    	<li><a href="modeli.php">MODELS</a></li>
                    	
                    	<li><a href="contact.php">CONTACT</a></li>
                    </ul>
                    <a href="#" id="respmenu" class="button"><i class="fa fa-lg fa-navicon"></i>&nbsp;&nbsp;&nbsp;&nbsp;Navigation</a>
                </nav>
            
            </div>
        </div>   
    
    </header><!-- kraj #header -->
    
    
    
    <section id="central">
    	<div class="wrapper">
        
        	<main id="main">
                    
                  
                	<a href"pojedinacno.php"></a>
<?php
require "DB.php";

if(isset($_GET['mod_id'])){
	$mod_id=$_GET['mod_id'];
	 $lista="SELECT * FROM modeli left join karoserija on karoserija.kar_id=modeli.kar_id where mod_id=$mod_id";
	 $rez= mysqli_query($konekcija,$lista);
	 while($row=mysqli_fetch_assoc($rez)){
		
		$cena=$row['mod_cena'];
		echo "<div id=".$mod_id.">"."<h1>".$row['mod_naziv']."</h1><img src=".$row['mod_slika']. ">"."<h2>".$row['mod_cena']."EUR</h2>"."<h4>".$row['mod_marka']."</h4><h4>".$row['mod_naziv']."</h4><h4>Karoserija: ".$row['kar_vrsta']."</h4><h4>".$row['mod_godiste']." godiste</h4><h4>".$row['mod_gorivo']."</h4><h4>Broj vrata ".$row['mod_broj_vrata']."</h4><h4>Garancija do ".$row['mod_garancija']."</h4><h4>".$row['mod_menjac']."</h4><h4>".$row['mod_motor']." TDI</h4></div>"; 
		
		
		$kveri="SELECT * FROM mydb.kkv_mod 
			left join karakteristike_vrednosti on kkv_mod.kkv_id = karakteristike_vrednosti.kkv_id
			where mod_id=$mod_id";
		$result=mysqli_query($konekcija,$kveri);
		
					while($row = mysqli_fetch_assoc($result)){
						$kkvid =  $row['kkv_id'];
						$vrednost=$row['kkv_vrednost'];
							echo "<div id=" . $kkvid . ">" . " <h4>". $vrednost ."</h4> </div>";
					
		 
		 
		}
		
		$query10="SELECT * FROM modeli left join opr_mod on modeli.mod_id=opr_mod.mod_id
				left join oprema on opr_mod.opr_id=oprema.opr_id where modeli.mod_id=$mod_id";
		$result=mysqli_query($konekcija,$query10);
		
		
		$row = mysqli_fetch_assoc($result);
						$modid =  $row['mod_id'];
						
							if($row['opr_airbag']==1){
								echo "<h4>AIR BAG</h4>";
							}
							if($row['opr_servo_volan']==1){
								echo "<h4>Servo Volan</h4>";
							}
							if($row['opr_putni_racunar']==1){
								echo "<h4>Putni Racunar</h4>";
							}
							if($row['opr_siber']==1){
								echo "<h4>Siber</h4>";
							}
							if($row['opr_alarm']==1){
								echo "<h4>Alarm</h4>";
							}
							if($row['opr_centralno_zakljucavanje']==1){
								echo "<h4>Centralno Zakljucavanje</h4>";
							}
							
		
		
	}
	
}
if(isset($_SESSION['ulogovan'])){
	
		echo "<form action='' method='POST'>
		<input type='number' name='kolicina' placeholder='kolicina'>
		<input type='submit' value='Ubaci u korpu'/>
		</form>";
		
	
		$narid=isset($_SESSION['nar_id']);
		if(isset($_POST['kolicina'])){
			$kolicina=$_POST['kolicina'];
			$query="INSERT INTO `mydb`.`stavke` (`stv_kolicina`, `stv_jedinicna_cena`, `mod_id`, `nar_id`) VALUES ('$kolicina', '$cena', '$modid', '$narid')";
			
			$result = mysqli_query($konekcija, $query);	
			
		}
	
}
if(isset($_SESSION['ulogovan']) && $_SESSION['status']=="admin"){
echo "<a href='promena.php?mod_id=$modid'>Promeni</a>";
}

?>
                    
                    

            </main>
            

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
        	<p>Copyright @ Volkswagen// <a href="#">privacy</a> / <a href="#">cookie policy</a> </p>
        
        </div>
    </footer>
    

</body>
</html>























