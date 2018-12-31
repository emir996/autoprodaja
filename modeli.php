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


</script>



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
                    	<li><a href="modeli.php">MODLES</a></li>
                    
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

            	<h1>Svi modeli</h1>
               
           		<p>&nbsp;</p>
           
           		
        
				<?php
				require "listanje.php"
				?>
               
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























