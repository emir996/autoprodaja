<?php
	session_start();

?>
<!Doctype html>
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
		
        
        <main id="mainFull">
			<h1>Log in</h1>
			<form action ="login.php" method="POST">
				<input type="text" name="username" placeholder="username"/></br>
				<input type="password" name="password" placeholder="password"/></br>
				<input type="hidden" name="login" value="login"/></br>
				<input type="submit" value="LOG IN"/>
			</form>

<?php
	require "DB.php";
	
	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST['login']) && ($_POST['login']=='login')){
		$username=$_POST["username"];
		$password=md5($_POST["password"]);
		$query="SELECT * FROM user WHERE usr_username='$username' AND usr_password='$password'";
		
		$result = mysqli_query($konekcija, $query);
		
		
		if(mysqli_num_rows($result)==1){
			
			$_SESSION["ulogovan"]=true;
			echo "ULOGOVAN SI </br>";
			
			if(mysqli_num_rows($result) == 1 ){
				

					$row = mysqli_fetch_assoc($result);
					$user_id =  $row['usr_id'];
					$_SESSION['ime']=$row['usr_name'];
    				$_SESSION['userid'] = $user_id;
					if($_SESSION['userid'] == 1){
						$_SESSION['status']= "admin";
					}
					else{
						$_SESSION['status']= "korisnik";
						$_SESSION['nar_id']=$row['nar_id'];

					}
				
				}
				
		}
		else{
			echo"POKUSAJ PONOVO";
		}
		//		echo "Cao ".$_SESSION['ime'] ."</br>";
		
	}
	if(isset($_SESSION['ulogovan'])){
			echo "<a href='logout.php'>LOGOUT</a></br>";
		}

	
	
	
	
?>
		<h1>Registracija</h1>
			<form action ="login.php" method="POST">
				<input type="text" name="ime" placeholder="ime"/></br>
				<input type="text" name="prezime" placeholder="Prezime"/></br>
				<input type="text" name="email" placeholder="email"/></br>
				<input type="password" name="password" placeholder="password"/></br>
				<input type="text" name="username" placeholder="username"/></br>
				<input type="text" name="adresa" placeholder="adresa za dostavu">
				<input type="hidden" name="reg" value="reg"/></br>
				<input type="submit" value ="REGISTRACIJA" /></br>
			</form>

<?php

	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["reg"]) && $_POST["reg"]=="reg"){
		$username=$_POST["username"];
		$password=md5($_POST["password"]);
		$ime=$_POST["ime"];
		$prezime=$_POST["prezime"];
		$mail=$_POST["email"];
		
		$adresa=$_POST["adresa"];
		$kveri="INSERT INTO `mydb`.`narudzbine` (`nar_dostava_adresa`) VALUES ('$adresa')";
		$result = mysqli_query($konekcija, $kveri);
		 $selectquery="select * from narudzbine order by nar_id DESC LIMIT 1";
		 $rezultat=$result = mysqli_query($konekcija, $selectquery);
		 $red = mysqli_fetch_assoc($rezultat);
					$narid =  $red['nar_id'];
		$query="INSERT INTO `mydb`.`user` (`usr_name`, `usr_lastname`,`nar_id`,`usr_username`, `usr_password`, `usr_email`) VALUES ('$ime', '$prezime','$narid', '$username', '$password', '$mail')";
		
		
		
	
		
		$result = mysqli_query($konekcija, $query);
		

	
		
	}


	if(isset($_SESSION['status']) && $_SESSION['status']=="admin"){
		echo "<a href='dodaj.php'> Dodaj oglas </a>";
	}
	?>
				<p><img src="images/about-banner.png" alt=""></p>
                
            </main>
        
            
        </div>
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























