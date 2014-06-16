<!DOCTYPE html>

<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="UTF-8">

		<title>YWEE</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" type="text/css" />

		<meta name="description" content="Personal Tutoring Service" />
		<meta name="description" content="tutoring service student" />
		    
		<script src="js/jquery.js"></script>
		<script src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
		<script src="js/main.js"></script>
		
	</head>
	<body>
		<div id="wrapper">
			<header>
			
				
				<div id="slideshowborder">
					<div id="slideshow-noscript">
						<img class='slider-img' src="img/slide1.png" alt="Slide 1" />
					</div> 
				</div> 
				<div id="slideshow">
					<img class='slider-img' src="img/slide1.png" alt="Slide 1" />
					<img class='slider-img' src="img/slide2.png" alt="Slide 2" />
					<img class='slider-img' src="img/slide3.png" alt="Slide 3" />    
					<img class='slider-img' src="img/slide4.png" alt="Slide 4" />
				</div> 
			
				<nav id="nav" role="navigation">
					<ul>
						<li><a href="index.php">Home</a></li> 
						<li><a href="?site=search">Suche</a></li> 
						<li><a href="?site=tutor">Tutoren</a></li>
						<li>
							<a href="?site=class">Kurse</a>
							<ul class="fallback">
								<li><a href="#">Mathematik</a></li>
							 	<li><a href="#">Deutsch</a></li>
							 	<li><a href="#">Englisch</a></li>
							 	<li><a href="#">Physik</a></li>
							 	<li><a href="#">Chemie</a></li>
							 	<li><a href="#">Wirtschaft</a></li>
						  	</ul>
						</li> 
						<li><a href="?site=about">&Uuml;ber</a></li> 
						<li><a href="?site=contact">Kontakt</a></li> 
				   	</ul>  
				</nav> 
			</header>
