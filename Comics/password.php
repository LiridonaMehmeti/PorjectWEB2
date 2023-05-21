<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-md-6 offset-md-3">
                    
                    <span class="anchor" id="formChangePassword"></span>
                    <hr class="mb-5">

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" action = "change.php" method = "post">
                            <?php if (isset($_GET['error'])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$_GET['error']?>
                            </div>
                            <?php } ?>
                                <div class="form-group">
                                    <label for="inputPasswordOld" >Current Password</label>
                                    <input type="password" class="form-control" name="curr_password" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew" >New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="inputPasswordNew" required="">
                                    <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" name="verify_password" id="inputPasswordNewVerify" required="">
                                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name ="changePw" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
</body>
</html>
