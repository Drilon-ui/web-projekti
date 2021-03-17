<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>


    <nav id="nav-header">
                  <h1>My name is John Doe, I am a London based<br>
                        <br>freelance website and graphic designer.</h1>
                    <img id="web" src="./images/web.png" alt="web">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="posts.php">Posts</a></li>
                        <li><a href="submit.php">Submit</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <?php

                        session_start();
                        if (!isset($_SESSION['id'])) {
                            ?>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Log in</a></li>
    
                        <?php } else {
                            ?>
                                <li><a href="logout.php">Log out</a></li>
                            <?php
                        } ?>
                    </ul>
                    
    </nav>