<!DOCTYPE html>
<html>
<head lang="en">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<title>Euphoria!</title>
</head>
<body>
	<div id="container">

			<div id="main">

				<nav id="nav">
					<h1>My name is John Doe, I am a London based<br>
						<br>freelance website and graphic designer.</h1>
					<img id="web" src="./images/web.png" alt="web">
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="posts.php">Posts</a></li>
						<li><a href="submit.php">Submit</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<?php

						if (!isset($_SESSION)) {
							session_start();
						}
						if (!isset($_SESSION['id'])) {
							?>
						<li><a href="register.php">Register</a></li>
						<li><a href="login.php">Log in</a></li>
	
						<?php } else {
							?>
								<li><a href="logout.php">Log out</a></li>
							<?php
						} ?>
					</ul>
					
				</nav>

				<div class="slidercontainer">  
		        <div class="showSlide fade">  
		            <img src="images/slider.png" />  
		            <div class="content">Slide1 heading</div>  
		        </div>  
		        <div class="showSlide fade">  
		            <img src="images/header-background.png" />  
		            <div class="content">Slide2 heading</div>  
		        </div>  
		  
		        <div class="showSlide fade">  
		            <img src="images/slider.png" />  
		            <div class="content">Slide3 heading</div>  
		        </div>  
		        <div class="showSlide fade">  
		            <img src="images/slider.png" />  
		            <div class="content">Slide4 heading</div>  
		        </div>  
		        <!-- Navigation arrows -->  
		        <a class="left" onclick="nextSlide(-1)">❮</a>  
		        <a class="right" onclick="nextSlide(1)">❯</a>  
			    </div>

			    
			<div id="contentt">
			      <div class="A"><p class="AA">Web Design</p><img src="images/web-design.png">
			    	<p>We have the most skilled Web developers in town !</p>
			    	<button class="minibutton" onclick="">More Information</button>
			      </div>
			      <div class="A"><p class="AA">Grahpic Design</p><img src="images/graphic-design.png">
			    	<p>We have the most skilled Web developers in town !</p>
			    	<button class="minibutton" onclick="">More Information</button>
			      </div>
			      <div class="A"><p class="AA">identity</p><img src="images/identity.png">
			    	<p>We have the most skilled Web developers in town !</p>
			    	<button class="minibutton" onclick="">More Information</button>
			    </div>

			    <footer>
			    	<div id="fdiv">
			    		<div class="f1" id="f1">
			    			<p>Copyright © CompanyName Inc.<br>
			    			   Free web templates by TemplatesDock!
			    			</p>
			    		</div>
			    		<div class="f1" id="f2">
			    			<p>ComplanyName Inc.<br>www.example.com<br>example@example.com<br>
			    			   Address:Street 123 ,New York City<br>
			    			   Phone:(012) 345-6789<br>
			    			</p>
			    		</div>
			    	</div>
			    </footer>
			</div>

			</div>
</div>
	<script src="js/euphoria.js"></script>
</body>
</html>