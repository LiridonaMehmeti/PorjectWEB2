<?php
session_start();

if(isset($_POST['password'])){
    header("Location: password.php");
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Edit Profile</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="edit.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  
 
</head>

<body>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edit Profile</h1>
   
    
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        
       
          <div class="form-group">
            <label class="col-lg-3 control-label" >First name:</label>
            <div class="col-lg-8">
              <label class="form-control"  value=""><?php  echo $_SESSION['name']?></label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php  echo $_SESSION['lastname']?>">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php  echo $_SESSION['number']?>">
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php  echo $_SESSION['email']?>">
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <label for="password" >**********</label>
              <form  method="post">
              <button class= "btn btn-success" name="password" >Change Password</button>
              </form>
            </div>
            
          </div>
        
      </div>
  </div>
</div>
<hr>
</body>
</html>