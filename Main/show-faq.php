
 <!DOCTYPE html>
<html lang="en">
<?php  
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All FAQs</title>
    <link rel="stylesheet" href="faq.css">
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

            </ul>
        </header>

<button class="open-button" onclick="openForm()">Add a New Question</button>

<div class="form-popup" id="myForm">
    <form method="POST" action="show-faq.php" class="form-container">
    <label for="email"><b>Enter Question</b></label>
    <input type="text" placeholder="Enter Question" name="question" required>

    <label for="answer"><b>Enter Answer</b></label>
    <input type="text" placeholder="Enter Answer" name="answer" required>
    <input type="submit" name="submit" class="btn " value="Add" />
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
    </script>
<?php

// connect with database
$conn = new PDO("mysql:host=localhost;dbname=login_db", "root", "lirak");
$sql = "CREATE TABLE IF NOT EXISTS faqs (
            id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
            question TEXT NULL,
            answer TEXT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
$statement = $conn->prepare($sql);
$statement->execute();


// check if insert form is submitted
if (isset($_POST["submit"])) {
    // create table if not already created
    $sql = "CREATE TABLE IF NOT EXISTS faqs (
            id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
            question TEXT NULL,
            answer TEXT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
    $statement = $conn->prepare($sql);
    $statement->execute();
        
    // insert in faqs table
    $sql = "INSERT INTO faqs (question, answer) VALUES (?, ?)";
    $statement = $conn->prepare($sql);
    $statement->execute([
        $_POST["question"],
        $_POST["answer"],
    ]);
    echo "<meta http-equiv='refresh' content='0'>";
}

// get all faqs from latest to oldest
$sql = "SELECT * FROM faqs ORDER BY id DESC";
$statement = $conn->prepare($sql);
$statement->execute();
$faqs = $statement->fetchAll();

?>


<div class='faq'>
    <?php foreach ($faqs as $faq): ?>
  <input id='faq-<?php echo $faq['question'] ?>' type='checkbox'>
  <label for='faq-<?php echo $faq['question'] ?>'>
    <p class="faq-heading"><?php echo $faq['question']; ?></p>
    <div class='faq-arrow'></div>
      <p class="faq-text"><?php echo $faq['answer']; ?></p>
  </label>
  <?php 
    if(!empty($_SESSION)){
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $id = $_SESSION['user_id'];
    $sth = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $sth->execute(array($id));
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($data[0]['user_type'] == "admin"){ //check if admin user role then add the option to delete questions
 ?>
  <form method="POST" class="end" action="delete-faq.php" onsubmit="return confirm('Are you sure you want to delete this FAQ ?');">
                            <input type="hidden" name="id" value="<?php echo $faq['id']; ?>" required />
                           <button type="submit" class="noselect"><span class='text'>Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg></span></button>
                        </form>
                    <?php }}?>
  <?php endforeach; ?>
   </div>

    </body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato);

@import url(https://fonts.googleapis.com/css?family=Open Sans);

.noselect {
  -webkit-touch-callout: none;
    -webkit-user-select: none;
     -khtml-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
		-webkit-tap-highlight-color: transparent;
}
.end{
    display: flex;
    justify-content: end;
}
button {
	width: 150px;
	height: 50px;
	cursor: pointer;
	display: flex;
	align-items: center;
	background: red;
	border: none;
	border-radius: 5px;
	box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
	background: #e62222;
}

button, button span {
	transition: 200ms;
}

button .text {
	transform: translateX(35px);
	color: white;
	font-weight: bold;
}

button .icon {
	position: absolute;
	border-left: 1px solid #c41b1b;
	transform: translateX(110px);
	height: 40px;
	width: 40px;
	display: flex;
	align-items: center;
	justify-content: center;
}

button svg {
	width: 15px;
	fill: #eee;
}

button:hover {
	background: #ff3636;
}

button:hover .text {
	color: transparent;
}

button:hover .icon {
	width: 150px;
	border-left: none;
	transform: translateX(0);
}

button:focus {
	outline: none;
}
{box-sizing: border-box;}

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
  width: 100%;
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
.faq-heading {
  font-family: Lato;   
  font-weight: 400;
  font-size: 19px;
   -webkit-transition: text-indent 0.2s;
  text-indent: 20px;
  color: #333;
}

.faq-text {
  font-family: Open Sans;   
  font-weight: 400;
  color: #919191;
  width:95%;
  padding-left:20px;
  margin-bottom:30px;
}

.faq {
  width: 1000px;
  margin: 0 auto;
  background: white;
  border-radius: 4px;
  position: relative;
  border: 1px solid #E1E1E1;
}
.faq label {
  display: block;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  height: 56px;
  padding-top:1px;
 
  background-color: #FAFAFA;
  border-bottom: 1px solid #E1E1E1;
}

.faq input[type="checkbox"] {
  display: none;
}

.faq .faq-arrow {
  width: 5px;
  height: 5px;
  transition: -webkit-transform 0.8s;
  transition: transform 0.8s;
  transition: transform 0.8s, -webkit-transform 0.8s;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  border-top: 2px solid rgba(0, 0, 0, 0.33);
  border-right: 2px solid rgba(0, 0, 0, 0.33);
  float: right;
  position: relative;
  top: -30px;
  right: 27px;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}

 .faq input[type="checkbox"]:checked + label > .faq-arrow {
  transition: -webkit-transform 0.8s;
  transition: transform 0.8s;
  transition: transform 0.8s, -webkit-transform 0.8s;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -webkit-transform: rotate(135deg);
          transform: rotate(135deg);
}
 .faq input[type="checkbox"]:checked + label {
  display: block;
  background: rgba(255,255,255,255) !important;
  color: #4f7351;
  height: 225px;
  transition: height 0.8s;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

 .faq input[type='checkbox']:not(:checked) + label {
  display: block;
  transition: height 0.8s;
  height: 60px;
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

::-webkit-scrollbar {
  display: none;
}


</style>