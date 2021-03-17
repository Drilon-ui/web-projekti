<?php 

	include 'header.php';
	require_once('connectvars.php');
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query = "SELECT * FROM posts";

	$data = mysqli_query($dbc, $query);

	while ($row = $data->fetch_row()) {
		?>
<div style="width: 32%; display: inline-block;">
<h3 style="line-height: 1"><?php echo $row[1] ?></h3>
<img src="<?php echo $row[3] ?>">
<p style="line-height: 1"><?php echo $row[2] ?></div>
 <?php	}

?>


<?php 
	
	include 'footer.php';

?>
