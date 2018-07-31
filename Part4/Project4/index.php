<!--This is index.php -->


<!DOCTYPE html>
<html>
<head>
	<title>Fish Creek Animal Hospital</title>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
</head>
<body>
<div id="wrapper">
<h1>Fish Creek Animal Hospital</h1>
<nav id="leftside">
<table>
	<tr><td><a href="index.php">Home</a></td></tr>

	<tr><td><a href="services.php">Services</a></td></tr>

	<tr><td><a href="Askvet.php">Ask the Vet</a></td></tr>

	<tr><td><a href="subscribe.php">Subscribe</a></td></tr>

	<tr><td><a href="contact.php">Contact</a></td></tr>
</table>
<?php
//declare database variables
$servername = "localhost";
$username = "root";
$password = "";
//connect to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=vet.sql", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; 
    }
    //catch exception if connection fails.
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
//close connection and free resources
$pdo=null;
?>
</nav>
<div id="rightside">
<br>
<section>
	<strong id="heading">Full Service Facility</strong>
	<article>
		Veterinarians and staff are on duty 24 hours a dat, 7 days a week.
	</article>
	<strong id="heading">Years of Experience</strong>
	<article>
		Fish Creek Veterinarians have provided quality,dependable care for your beloved animals since 1984.
	</article>
	<strong id="heading">Open Door Policy</strong>
	<article>
		Our professionals welcome owners to stay with their pets during any medical procedure.
	</article>
<wbr>
</section>
<p
	>800-5555-555<br>
	1242 Grassy Lane<br>
	Fish Creek,WI 55534<br>
</p>
<wbr>

<footer>
	Copyright © 2016 Fish Crrek Animal Hospital<br>
	<a href="mailto:sarika.kshatriya@mavs.uta.edu">sarika@kshatriya.com</a>
</footer>
<wbr>
</div>
</div>
</body>
</html> 