
<?php 
	
	$currentPage = 'register';
	include 'header.php';
  require_once('connectvars.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>REGISTER</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
  

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user (username, email,  password, join_date) VALUES ('$username', '$email', SHA('$password1'), NOW())";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to log in</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
        $email ="";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>
<div id="container">
  <p id="register-p">Please enter your username and desired password to register</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <legend id="registration">Registration</legend>
      <div class="register-username">
	      <label for="username">Username:</label>
	      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
	   </div>
	   <div class="register-Email">   
	      <label for="email">Email: </label>
	      <input type="email" id="email" name="email" /><br />
	   </div>
	   <div class="register-Password">
	      <label for="password1">Password:</label>
	      <input type="password" id="password1" name="password1" /><br />
	   </div>
	   <div class="register-Password2">
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
      </div>
    <div class="register-btn">
            <button name="submit" onmouseleave="hideParagraphs();" onclick="checkInput();">
                 Register
            </button>
    </div>
  </form>
</div>
</body> 
</html>
<?php 

	include 'footer.php';

?>