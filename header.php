<?php
require_once ('includes/bootstrap.php');
session_start();
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to database');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $config_blogname; ?></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<div id="header">
	<h1><?php echo $config_blogname; ?></h1>
	<ul class="menu">
		<li><a href="index1.php">home</a></li>
		<li><a href="viewcat.php">categories</a></li>
		<li>
			<?php
			if(isset($_SESSION['USERNAME'])) {
				echo "<a href='logout.php'>log out</a>";
			} else {
				echo "<a href='login.php'>log in</a>";
			}
			?>
		</li>
		<?php
		if(isset($_SESSION['USERNAME'])) {
			echo "<li><a href='addentry.php'>add entry</a></li>";
			echo "<li><a href='addcat.php'>add category</a></li>";
		}
		?>
	</ul>
</div>

<div id="main">		