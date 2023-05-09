<main>
<?php 
include "../controller/UserC.php";
if(isset($_POST['submit'])) {

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
 
  $profilePic = $_FILES['profilePic']['name'];
  $profilePicTmpName = $_FILES['profilePic']['tmp_name'];
  
  
  
  $gender = $_POST['gender'];
  $dateOfBirth = $_POST['dateOfBirth'];

$createdAt = date('Y-m-d H:i:s');
  $modifiedAt =null ;
  $deletedAt = null;
  // handle the uploaded file
 

  $targetDir = "uploads/";
	$targetDir1 = "backoffice/pages/uploads/"; 
  
	$targetFile = $targetDir . basename($profilePic);
	$targetFile1 = $targetDir1 . basename($profilePic);
	
	move_uploaded_file($profilePicTmpName, $targetFile); // Move to first target directory
	
	// Make a copy of the uploaded file to the second target directory
	if (copy($targetFile, $targetFile1)) {
		echo "File has been successfully uploaded to both target directories.";
	} else {
		echo "Failed to upload file to second target directory.";
	}
$userDao = new UserC();

  $user = new User();
  $user->setfullname($fullname);
  $user->setEmail($email);
  $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
  $user->setPhone($phone);
  $user->setadresse($address);
  $user->setProfilePic($targetFile);
  $user->setGender($gender);
  $user->setDateOfBirth($dateOfBirth);
  $user->setCreatedAt($createdAt);
  $user->setRole("client");




$user->setCreatedAt($createdAt);
//$user->setModifiedAt($modifiedAt);
//  $user->setDeletedAt($deletedAt);
  // insert the user into the database
  $userDao->create($user);
 // var_dump($user);

  
}




?>
</main>

<main>

<?php
session_start();
$emailErr = $passwordErr = $loginErr = "";

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_POST['login'])) {
	// Get form data
	$email = $_POST['email1'];

	$password = $_POST['password1'];
		// Check if email is empty
		if (empty($email)) {
			$emailErr = "Please enter your email.";
		}
		// Check if password is empty
		if (empty($password)) {
			$passwordErr = "Please enter your password.";
		}
		if (empty($emailErr) && empty($passwordErr)) {
			$userDao = new UserC();
			if ($userDao->verifyCredentials($email, $password)){
        
				$token = bin2hex(random_bytes(32));
				$user = $userDao->login($email);

				// Set session variables
				$_SESSION['email1'] = $email;
				$_SESSION['token'] = $token;
        $_SESSION['id'] = $userDao->verifyCredentials($email, $password);

        header('Location: captcha.html');
        exit();
					//header('Location: loggedin.php');
					//exit();
				

			} else {
				// Invalid login credentials, show error message
				$loginErr = "Invalid email or password. Please try again.";
			}
		}
	}

?>




</main>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../view/assets/css/style_login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method ="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input <?php if(!empty($emailErr) || !empty($loginErr)){ echo 'style="background-color: #FFB6C1"';} ?> name ="email1" type="text" placeholder="Email" />
              <span class="error"><?php echo $emailErr;?></span>

            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input <?php if(!empty($passwordErr) || !empty($loginErr)){ echo 'style="background-color: #FFB6C1"';} ?> name ="password1" type="password" placeholder="Password" />
              <span class="error"><?php echo $passwordErr;?></span>

            </div>
            <input type="submit" value="Login" class="btn solid" name ="login" />
            <span class="error"><?php echo $loginErr;?></span>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <a href="forget_password.php">Forgot your password?</a>
          </form>
          
          <form method="POST" action="#" class="sign-up-form" enctype="multipart/form-data" id="signup_form">
  <h2 class="title">Sign up</h2>
  <div class="input-field">
    <i class="fas fa-user"></i>
    <input name ="fullname" type="text" placeholder="Fullname" id="fullname" />
  </div>
  <div class="input-field">
    <i class="fas fa-envelope"></i>
<input  name ="email" type="email" placeholder="Email" id="email" />
  </div>
  <div class="input-field">
    <i class="fas fa-lock"></i>
    <input  name ="password" type="password" placeholder="Password" id="password"/>
  </div>
  <div class="input-field">
    <i class="fas fa-venus-mars"></i>
    <select name ="gender">
      <option value="" disabled selected>Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>
  <div class="input-field">
    <i class="fas fa-map-marker-alt"></i>
    <input name ="address" type="text" placeholder="Address" id="adress"/>
  </div>
  <div class="input-field">
    <i class="fas fa-phone"></i>
    <input name ="phone" type="tel" placeholder="Phone" id="phone"/>
  </div>
  <div class="input-field">
    <i class="fas fa-calendar-alt"></i>
    <input name ="dateOfBirth" type="date" placeholder="Date of Birth" id="dateOfBirth"/>
  </div>
  <div class="input-field">
    <i class="fas fa-image"></i>
    <input name="profilePic" type="file"  />
  </div>

  <button  type="submit" class="btn" name="submit" id="submit-btn" onclick="return checkPassword()">Sign up</button>
  <script>
      document.addEventListener('DOMContentLoaded', function() {


var submitBtn = document.getElementById('submit-btn');


submitBtn.addEventListener('click', function(event) {
  var nomInput = document.getElementById('fullname');
  var nomValue = nomInput.value;


  if (/^[a-zA-Z]+$/.test(nomValue)) {
    // nom input is valid
  } else {
    event.preventDefault();
    var nomErrorMsg = document.createElement('span');
    nomErrorMsg.innerText = 'Le login  ne doit contenir que des lettres.';
    nomInput.parentNode.insertBefore(nomErrorMsg, nomInput.nextSibling);
  }


  


  var emailInput = document.getElementById('email');
  var emailValue = emailInput.value;


  if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue)) {
    // email input is valid
  } else {
    event.preventDefault();
    var emailErrorMsg = document.createElement('span');
    emailErrorMsg.innerText = 'Veuillez entrer une adresse email valide.';
    emailInput.parentNode.insertBefore(emailErrorMsg, emailInput.nextSibling);
  }
});


});
</script>
</form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="../view/assets/images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
        </div>
      </div>
    </div>
<footer>

<script src="../view/js/app.js"></script>

</footer>
    
  </body>
</html>
