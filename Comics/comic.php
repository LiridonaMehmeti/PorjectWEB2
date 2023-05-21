<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="comic.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/marvelLogo2.png" alt="..." height="36">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/PorjectWEB2/Main/main.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">VIDEOS</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/PorjectWEB2/1Movie/movie.html">MOVIES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/PorjectWEB2/contactus/contactus1.html">CONTACT US</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/PorjectWEB2/Heroes/Wanda.html">HEROES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/PorjectWEB2/Characters/characters.html">CHARACTERS</a>
        </li>
      </ul>
	     <img src="img/profile.png" class="user-pic" onclick="toggleMenu()">
		 <div class="sub-menu-wrap" id="subMenu" >
			<div class="sub-menu" >
				<div class="user-info" >
					<img src="img/profile.png" >
					<h1>User</h1>
				</div>
				<hr>
		
				<a href="/PorjectWEB2/Comics/profile.php" class="sub-menu-link" >
					<img src="img/profile.png">
					<p>Edit Profile</p>
					<span></span>
				</a>
				
				<a href="/PorjectWEB2/Comics/aboutus.php" class="sub-menu-link" >
					<img src="img/help.png">
					<p>About Us</p>
					<span></span>
				</a>
					<a href="/PorjectWEB2/Main/Login.php" class="sub-menu-link" >
					<img src="img/logout.png">
					<p>Log Out</p>
					<span></span>
				</a>
				</a>
			</div>
		 </div>
    </div>
  </div>
 </nav>
 <!-- Page Content -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="btn-group btn-group-lg">
				<button type="button" class="btn btn-secondary m-2 mt-5 border border-light" onclick="onbtnClick(1)">Avengers: Ultron Unlimited</button>
				<button type="button" class="btn btn-secondary m-2 mt-5 border border-light" onclick="onbtnClick(2)">Dark Avengers: Assemble</button>
				<button type="button" class="btn btn-secondary m-2 mt-5 border border-light" onclick="onbtnClick(3)">Avengers Disassembled</button>
				<button type="button" class="btn btn-secondary m-2 mt-5 border border-light" onclick="onbtnClick(4)">Avengers Forever</button>
				<button type="button" class="btn btn-secondary m-2 mt-5 border border-light" onclick="onbtnClick(5)">Avengers: The Kree-Skrull War</button>
			</div>
		</div>
	</div>
	<div class="row" id="cardDiv" style="display:none">
		<div class="col-md-12 text-center">
			<div class="card">
				<img src="" class="card-img-top" id="cardImg"
					alt="huh?" />
					<div class="card-body">
						<h5 class="card-title" id="cardTitle">COMIC TITLE</h5>
						<p class="card-text" id="cardText">
							Very long description
						</p>
					</div>
			</div>
		</div>
	</div>
</div>

	<script src="comic.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>