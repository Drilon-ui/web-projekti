<?php 

	session_start();

	if(isset($_SESSION['id'])){
		//Delete the session vars by clearing the $_SESSION arrya
		$_SESSION = array();

		//Delete the session cookie by setting its expiration to an hour ago(3600)
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(), '', time() - 3600);
		}

		//Destroy the session
		session_destroy();
	}

	//Delete the user ID and username cookies  by setting their expiration to an hour ago(3600)
	setcookie('id', '', time() - 3600);
	setcookie('username', '', time() - 3600);

	//redirect to the login page
	$login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
	header('Location: ' . $login_url);
 	 

?>