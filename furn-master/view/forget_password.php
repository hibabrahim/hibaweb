<?php

use PHPMailer\PHPMailer\PHPMailer;
include '../controller/UserC.php';


// Check if form is submitted
if (isset($_POST['recover-submit'])) {
    // Retrieve email from form data
    $email = $_POST['email'];
    
    $UserC = New UserC();
    // Check if email exists in database
   $user = $UserC->getUserByEmail2($email);

    if (!$user) {
        // Email doesn't exist in database
        echo '<div class="alert alert-danger">Email address not found</div>';
    } else {
        // Email exists in database
        // Generate token and update user in database
        $token = bin2hex(random_bytes(32));


        $UserC->updateUserResetToken($email, $token);

        require_once 'PHPMailer/src/Exception.php';
        require_once 'PHPMailer/src/PHPMailer.php';
        require_once 'PHPMailer/src/SMTP.php';
        $message = "http://localhost:3000/view/new_password.php?token=" . $token;
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mohamedamine.balti@esprit.tn'; // Gmail address which you want to use as SMTP server
            $mail->Password = '191JMT2665'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
        
            $mail->setFrom('mohamedamine.balti@esprit.tn', 'Avicenna'); // Gmail address which you used as SMTP server
            $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
            $mail->isHTML(true);
            $mail->Subject = "Reset your password";
            $mail->Body = " Please click the link below to reset your password:\n\n <br> " . $message;
            $mail->send();
        } catch (Exception $e) {
            $alert = '<div class="alert-error">
                         <span>'.$e->getMessage().'</span>
                      </div>';
        }




        // Redirect to success page
        header("Location: login.php?success=1");
        exit;
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
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                  <form id="register-form" role="form" autocomplete="off" class="form" method="post">
  <div class="form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
      <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
    </div>
    
  </div>
  <div class="form-group">
    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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