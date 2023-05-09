<?php 
include '../controller/UserC.php';

if (isset($_POST['update-password'])) {
  $token = $_GET['token'];
  $password = $_POST['password'];

  $UserC = new UserC();
  $updated = $UserC->updateUserPassword($token, $password);

  if ($updated) {
      // Password updated successfully
      header("Location: login.php?password-updated=1");
      exit;
  } else {
      // Token not found
      echo '<div class="alert alert-danger">Invalid or expired token</div>';
  }
}





?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Enter Your New Password Here</p>
                  <div class="panel-body">
    
                  <form id="register-form" role="form" autocomplete="off" class="form" method="post" >
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" name="password" placeholder="password" class="form-control"  type="password">
    </div>
  </div>
  <div class="form-group">
    <input name="update-password" class="btn btn-lg btn-primary btn-block" value="Save" type="submit">
  </div>
</form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>

<style>

.form-gap {
    padding-top: 150px;
}
</style>