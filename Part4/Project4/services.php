<!--This is services.php-->

<!DOCTYPE html>
<html>
<head>
	<title>Fish Creek Animal Hospital</title>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
</head>
<body>
<div id="wrapper">
<h1>
	Fish Creek Animal Hospital
</h1>
<nav id="leftside">
<table>
	<tr><td><a href="index.php">Home</a></td></tr>

	<tr><td><a href="services.php">Services</a></td></tr>

	<tr><td><a href="Askvet.php">Ask the Vet</a></td></tr>

	<tr><td><a href="subscribe.php">Subscribe</a></td></tr>

	<tr><td><a href="contact.php">Contact</a></td></tr>
</table>
</nav>
<div id="rightside">
<?php
//declare databse variables
$servername = "localhost";
$username = "root";
$password = "";
//connect to database
try {
    $pdo = new PDO("mysql:host=$servername;dbname=vet.sql", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully"; 
    //retrieve data from service table from database.
    $sql="select servicename,description from service";
    $result=$pdo->query($sql);
    while($row=$result->fetch())
   	 {?>
   	<ul class="list">
   	<li>
    	<b id="heading2"><?php echo $row['servicename'];?></b> </li>
    	<p>    <?php echo $row['description'];?></p>
   	 </ul>
   	 <?php
   	 }
   	
   	}

    //catch exception if connection fails.
catch(PDOException $e)
    {
    	die($e->getMessage());
  //  echo "Connection failed: " . $e->getMessage();
    }
//close connection and free resources
$pdo=null;
?>
<br>
<footer>
	Copyright © 2016 Fish Crrek Animal Hospital<br>
	<a href="mailto:sarika.kshatriya@mavs.uta.edu">sarika@kshatriya.com</a>
</footer>
<br>
</div>
</div>
</body>
</html> 