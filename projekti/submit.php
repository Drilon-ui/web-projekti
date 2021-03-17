<?php 
require_once('connectvars.php');
include 'header.php';





  if (isset($_POST['submit'])) {
    if(!isset($_SESSION['id'])){
        echo '<p class="error">You need to log in to submit a post</p>';
        echo '<p><a href="login.php"</a>Log In</p>';
    }
    else{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    $target_dir = "images/";
    $image = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $image);
    $query = "INSERT INTO posts (title, description, image) VALUES ('$title', '$description', '$image')";
    mysqli_query($dbc, $query);
    mysqli_close($dbc);
    
    //THIS WILL PREVENT TO SEND MULTIPLE TIME THE SAME FORM UPON REFRESH
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
        <div class="submit-heading">
            <h1>Submit a post</h1>
        </div>
        <form method="post" class="submit-form" enctype="multipart/form-data"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="submit-title">
                <label for="title">Title: </label>
                <input type="text" name="title" required id="title" placeholder="Enter a title">
            </div>
            <div class="submit-image">
                <label for="image">Image: </label>
                <input type="file" name="file" required id="file">
            </div>
            <div class="submit-description">
                <label for="description">Description: </label>
                <textarea name="description" id="" cols="61" rows="8" value="" required id="description"
                          placeholder="Enter a description"></textarea>
            </div>
            <div class="submit-btn">
                <button name="submit" type="submit">
                    Submit
                </button>
            </div>
        </form>
       <?php
         //   $util::submit();
        ?>
    </div>
<?php 

	include 'footer.php';

?>