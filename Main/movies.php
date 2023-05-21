<!DOCTYPE html>
<html lang="en">
<?php  
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="faq.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body>
    <section>
        <header>
            <a href="index.php"><img src="img/marvelLogo2.png" alt="logo" class="logo"></a>
            <div class="toggle">

            </div>
            <?php if(!empty($_SESSION)) {?>
             <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                                Signout
                            </a>
                            <?php } ?>
            <ul class="navigation">
                <li><a href="#">Videos</a></li>
                <li><a href="../1Movie/movie.html">Movies</a></li>
                <li><a href="../contactus/contactus1.html">Contact us</a></li>
                <li><a href="../Characters/characters.html">Characters</a></li>
                <li><a href="../Games/main.html">Games</a></li>
                <li><a href="show-faq.php">FAQ</a></li>
            </ul>
        </header>
        

           

            <?php
            $conn = new PDO("mysql:host=localhost:3333;dbname=login_db", "root", "");
            $sql = "SELECT * FROM movies ORDER BY id DESC";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $movies = $statement->fetchAll();
            // var_dump($faqs);
            
            ?>
	<?php foreach($movies as $movie): ?>
    <div id="container">	
	<div class="product-details">
		
	<h1><?php echo $movie['name'] ?></h1>

		<!-- 		Control -->
  <div class="control">
	


  <!-- 		Buy Now / ADD to Cart-->
     <button id="stockButton" data-test="<?php echo $movie['id']; ?>" onclick="doSomething(<?php echo $movie['id']?>);" class="btn buy">Buy Now</button>

   <span id="stock-nr<?php echo $movie['id']; ?>" class="stock">Stock Number:<?php echo $movie['stock'] ?> </span>
    <!-- End Button buying -->
    
  </div>
  
</button>
<?php 
    if(!empty($_SESSION)){
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $id = $_SESSION['user_id'];
    $sth = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $sth->execute(array($id));
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($data[0]['role'] == "admin"){ //check if admin user role then add the option to delete questions
 ?>
<form method="POST" class="end" action="delete-movie.php" onsubmit="return confirm('Are you sure you want to delete this Movie ?');">
                          <input type="hidden" name="id" value="<?php echo $movie['id']; ?>" required />
                           <button type="submit" class="btn-delete"><span class='red'>Delete</span></button>
                        </form>
                        <?php }} ?>
                 
</div>
<div class="product-image">
	
	<img src="img/<?php echo $movie['name'] ?>.jpeg" alt="<?php echo $movie['name'] ?>">
	
</div>
</div>
  <?php endforeach;?>
  <?php 
    if(!empty($_SESSION)){
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $id = $_SESSION['user_id'];
    $sth = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $sth->execute(array($id));
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($data[0]['role'] == "admin"){ //check if admin user role then add the option to delete questions
 ?>
  <button class="open-button" onclick="openForm()">Add a New Movie</button>

<div class="form-popup" id="myForm">
    <form method="POST" action="movies.php" class="form-container">
    <label  class="text" for="name"><b>Enter Name</b></label>
    <input  class="text" type="text" placeholder="Enter Movie Name" name="name" required>

    <label  class="text" for="stock"><b>Enter Stock</b></label>
    <input class="text" type="text" placeholder="Enter Stock" name="stock" required>
    <input type="submit" name="submit" class="btn " value="Add" />
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<?php } }?>


<?php

// connect with database
$conn = new PDO("mysql:host=localhost:3333;dbname=login_db", "root", "");


// check if insert form is submitted
if (isset($_POST["submit"])) {
    
    // insert in faqs table
    $sql = "INSERT INTO movies (name, stock) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["name"],
        $_POST["stock"],
    ]);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
    </script>
        
<script>
  function doSomething(id) { 
    console.log('aha',id);

    
    const stockId = id; // Replace with your logic to retrieve the ID  
      $.ajax({
        url: 'update_stock.php', // PHP file to handle the request
        method: 'POST',
        data: { stockId: stockId }, // Data to send to the server
        success: function(response) {
          console.log("response:" + response); // Display the response from the server
          $('#stock-nr'+ id).text("Stock Number: " + response);
        },
        error: function(xhr, status, error) {
          console.error(error); // Display any errors
        }
      });
} 


  </script>








</body>
<style>
  /* fonts  */
@import url('https://fonts.googleapis.com/css?family=Abel|Aguafina+Script|Artifika|Athiti|Condiment|Dosis|Droid+Serif|Farsan|Gurajada|Josefin+Sans|Lato|Lora|Merriweather|Noto+Serif|Open+Sans+Condensed:300|Playfair+Display|Rasa|Sahitya|Share+Tech|Text+Me+One|Titillium+Web');

body {
background: #DFC2F2;
	background-image: linear-gradient( 135deg, #CE9FFC 10%, #7367F0 100%);
	background-attachment: fixed;	
	background-size: cover;
	}
  $delete-red: red;

body {
  margin: 32px;
}
.text{
  color: black !important;
}
/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
  z-index: 10;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 20;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 85%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.red{
  background-color: red;
}
.btn {
  display: flex;
  align-items: center;
  background: none;
  border: 1px solid lighten(gray, 24%);
  height: 48px;
  padding: 0 24px 0 16px;
  letter-spacing: .25px;
  border-radius: 24px;
  cursor: pointer;
  
  &:focus {
    outline: none;
  }
  
  .mdi {
    margin-right: 8px;
  }
}

.btn-delete {
  font-size: 16px;
  color: red;
  
  >.mdi-delete-empty {
    display: none;
  }
  
  &:hover {
    background-color: lighten(red, 48%);
    
    >.mdi-delete-empty {
      display: block;
    }
    
    >.mdi-delete {
      display: none;
    }
  }
  

  
  &:focus {
    box-shadow: 0 0 0 4px lighten(red, 40%);
  }
}

.stock{
  color: black;
}
#container{
	box-shadow: 0 15px 30px 1px rgba(128, 128, 128, 0.31);
	background: rgba(255, 255, 255, 0.90);
	text-align: center;
	border-radius: 5px;
	overflow: hidden;
	/* margin: 5em auto; */
	height: 350px;
	width: 700px;
  margin: 20px
	
}



/* 	Product details  */
.product-details {
	position: relative;
	text-align: left;
	overflow: hidden;
	padding: 30px;
	height: 100%;
	float: left;
	width: 40%;

}

/* 	Product Name */
#container .product-details h1{
	font-family: 'Old Standard TT', serif;
	display: inline-block;
	position: relative;
	font-size: 34px;
	color: #344055;
	margin: 0;
	
}


/*Product Rating  */
.hint-star {
	display: inline-block;
	margin-left: 0.5em;
	color: gold;
	width: 50%;
}


/* The most important information about the product */
#container .product-details > p {
	font-family: 'Farsan', cursive;
	text-align: center;
	font-size: 20px;
	color: #7d7d7d;
	
}

/* control */

.control{
	position: absolute;
	bottom: 20%;
	left: 22.8%;
	
}
/* the Button */
.btn{
	transform: translateY(0px);
	transition: 0.3s linear;
	background: #49C608;
	border-radius: 5px;
  position: relative;
  overflow: hidden;
	cursor: pointer;
	outline: none;
	border: none;
	color: #eee;
	padding: 7px;
	margin: 20px;
	
}

.btn:hover{transform: translateY(-4px);}

.btn button {
	font-family: 'Farsan', cursive;
	transition: transform 0.3s;
	display: inline-block;
  padding: 10px 20px;
	font-size: 1.2em;
	margin:0;
	
}
/* shopping cart icon */
.btn .price, .shopping-cart{
	background: #333;
	border: 0;
	margin: 0;
}


/* the Icon */
.btn .shopping-cart {
	transform: translateX(-100%);
  position: absolute;
	background: #333;
	z-index: 1;
  left: 0;
  top: 0;
}

/* buy */
.btn .buy {z-index: 3; font-weight: bolder;}





/* product image  */
.product-image {
	transition: all 0.3s ease-out;
	display: inline-block;
	position: relative;
	overflow: hidden;
	height: 100%;
	float: right;
	width: 50%;
	display: inline-block;
}

#container img {width: 100%;height: 100%;}

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Farsan', cursive;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.9;
    text-align: left;
    font-size: 120%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}

.info h2 {text-align: center}
.product-image:hover .info{transform: translateX(0);}

.info ul li{transition: 0.3s ease;}
.info ul li:hover{transform: translateX(50px) scale(1.3);}

.product-image:hover img {transition: all 0.3s ease-out;}
.product-image:hover img {transform: scale(1.2, 1.2);}
</style>


