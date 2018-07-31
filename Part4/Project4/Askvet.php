<!--This is Askvet.php -->


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
</nav>
<div id="rightside">
<?php
//declare database variables
$servername = "localhost";
$username = "root";
$password = "";
//connect to database
try {
    $pdo = new PDO("mysql:host=$servername;dbname=vet.sql", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully"; 
    //retrieve info from question table
    $sql="select question,answer from question";
    $result=$pdo->query($sql);
    while($row=$result->fetch())
   	 {?>
   	<section>
    	<b id="heading2"><?php echo $row['question'];?> </b><br>
    	<article>
    		  <?php echo $row['answer']."<br/>"."<br/>";?>
    	</article>
  	</section>
   	 <?php }
   	 $pdo=null;
   	}
   	
//catch exception if connection fails
    
catch(PDOException $e)
    {
    	die($e->getMessage());
  //  echo "Connection failed: " . $e->getMessage();
    }
//close connection and free resources
$pdo=null;
?>

<footer>
	Copyright © 2016 Fish Crrek Animal Hospital<br>
	<a href="mailto:sarika.kshatriya@mavs.uta.edu">sarika@kshatriya.com</a>
</footer>
<br>
</div>
</div>
</body>
</html>