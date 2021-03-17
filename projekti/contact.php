<?php 
$currentPage = 'contact'; 
include ('header.php');
require_once('connectvars.php');

if (isset($_POST['submit'])) {
    if(!isset($_SESSION['id'])){
        echo '<p class="error">You need to log in to submit a post</p>';
        echo '<p><a href="login.php"</a>Log In</p>';
    }
    else{
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
      $subject = mysqli_real_escape_string($dbc, trim($_POST['subject']));
    $message = mysqli_real_escape_string($dbc, trim($_POST['message']));
    $query = "INSERT INTO contacts (email, subject, message) VALUES ('$email', '$subject', '$message')";
    mysqli_query($dbc, $query);
    mysqli_close($dbc);
    //THIS WILL PREVENT TO SEND SAME FORM MULTIPLE TIME UPON REFRESHH
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
    }
  }
}
?> 

<div id="container">
  <p id="register-p"></p>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <legend id="registration">Contact Us</legend>
  <div class="contact-email">
    <label for="email">Email: </label>
    <input type="email" name="email"><br />
  </div>
  <div class="contact-subject">
    <label for="subject">Subject: </label>
    <input type="text" name="subject">
  </div>
  <div class="contact-message">
    <label for="message">Message: </label>
    <textarea rows=8 cols=61 name="message"></textarea>
  </div>
  <div class="contact-btn">
    <button type="submit" name="submit">Submit</button>
  </div>
  
</form>
    <div class="contact-content">
        <div class="contact">
           <p>Facebook:  <a href="https://facebook.com/drilonarifi">https://facebook.com/drilonarifi</a></p>
           <p>Twitter: <a href="https://twitter.com/drilonarifi">https://twitter.com/drilonarifi</a></p>
           <p>Instagram: <a href="https://instagram/drilonarifi">https://instagram/drilonarifi</a></p>
           <p>G-Mail: <a href="https://gmail.com">da35440@ubt-uni.net</a></p>
           <p>Phone Nr: <a href="#">044-044-044</a></p>
       </div>
       <div class="google">
        <h1>Location</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11737.935820558167!2d21.167515682737108!3d42.65109881669246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec5989c3e7b%3A0xdce360181b819e84!2sBregu+i+Diellit%2C+Prishtina!5e0!3m2!1sen!2s!4v1497920471995" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

</div>

<?php
 
	include('footer.php');
?>
