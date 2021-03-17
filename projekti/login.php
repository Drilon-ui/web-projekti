<?php 
	$currentPage = 'login';
	include 'header.php';

	require_once('connectvars.php');

	//Start the session 
	if (!isset($_SESSION)) {
		session_start();
	}

	//Clear the error msg
	$error_msg = "";

	//if the user isnt logged in try to log them in
	if(!isset($_SESSION['id'])){
		if(isset($_POST['submit'])){

			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			//Grab the user-entered log-in data
			$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

			if(!empty($user_username) && !empty($user_password)){
				//Lookup for the username and password in the database
				$query = "SELECT id, username FROM user WHERE username = '$user_username' AND password = SHA('$user_password')";
				$data = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

				if(mysqli_num_rows($data) == 1){
					//The log in is OK so set the user id and username vars (and cookies)
					$row = mysqli_fetch_array($data);
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));//expires in 30 days
					setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));//expires in 30 days
				}
				else{
					//The username/ passowrd are incorrect so set an error message
					$error_msg = 'Sorry, you must enter a valid username and password to log in';
				}
			}

			else{
				//the username/password weren't entered so set an error message
				$error_msg = 'Sorry, you must enter your username and password to log in';
			}
		}
	}

	 /* Insert the page header
     $page_title = 'Log In';
     require_once('header.php');*/

     //If session var is empty show any error msg and log-in form; otherwise confirm the log in

     if(empty($_SESSION['id'])){
     	echo '<p class="error">' . $error_msg . '</p>'; 
     

?>
	
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
      <legend class="login-legend">Log In</legend>
      <div class="login-username">
	      <label for="username">Username:</label>
	      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
	  </div>
	  <div class="login-password">    
	      <label for="password">Password:</label>
	      <input type="password" name="password" />
	  </div>    
    <div id="login-btn">
    	<button name="submit" onmouseleave="hideParagraphs();" onclick="checkInput();">
    		Log In
    	</button>
    	
	</div>
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>

<?php 

	include 'footer.php';

?>