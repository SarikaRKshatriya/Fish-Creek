<!--This is contact.php -->


<!DOCTYPE html>
<html>
<head>
	<title>Fish Creek Animal Hospital</title>
	<link rel="stylesheet" type="text/css" href="fishcreek.css">
</head>
<body>
<style>
.error {color: #FF0000;}
</style>
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
 //   echo "Connected successfully"; 
    }
  //catch the exception if connection fails.
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php
//turn on error reporting
ini_set('error_reporting',E_ALL);
ini_set('display_errors','1');
//define variables and set to empty values
$nameErr=$emailErr=$commentErr="";
$name=$email=$comment="";
$result="";
$flag=1;
//validation
if (isset($_POST['submit']))
{
	if(empty($_POST["name"]))
	{
		$nameErr="Name is required";
    $flag=0;
	}
	else
	{
    $name = test_input($_POST["name"]);
  }
  $email = test_input($_POST["email"]);
	 if (empty($_POST["email"]))
	 {
    	$emailErr = "Email is required";
       $flag=0;
   } 
   elseif(!preg_match("/(.+)@([^\.].*)\.([a-z]{2,})/",$email))
    {  
    	// check if e-mail address is well-formed
   		$emailErr = "Invalid email format"; 
      $flag=0;
    }
    else
    {
      $email = test_input($_POST["email"]);
    }  
    if (empty($_POST['comment']))
     {
    	$commentErr = "comment is required.";
       $flag=0;
  	 } 
  	 else 
  	 {
    	$comment = test_input($_POST["comment"]);
     }
  	 //storing values into the php variables.
  	 $name=$_POST["name"];
  	 $email=$_POST["email"];
  	 $comment=$_POST["comment"];
    
    if(($flag==1))
    {
  	// echo "inserting these values to MySQL database in contact table";
  	 $conn->query("INSERT INTO contact (name,email,comments) VALUES ('$name','$email','$comment')");

  	 //echo "Thank you for submitting your details!";
    }
    else
    {
      echo "<script type='text/javascript'>alert('Please provide required information.');</script>";
      //echo "Please provide required info.";
    }
}
//check for the html special characters,etc.
function test_input($data)
{
	$data=trim($data);
	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
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
<h3 id="contacthead">Contact Fish Creek</h3><br>
<p>Required fields are marked with an asterisk(*).</p><br>
<!--form and removing validation from html-->
<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>" novalidate>
<label for="name">*Name:</label>
<input type="text" name="name" placeholder="Enter name"value="<?php echo $name;?>"><span class="error"><?php echo $nameErr;?></span>
<br><br><label for="email">*E-mail:</label>
<input type="email" name="email" placeholder="Enter email address" value="<?php echo $email;?>">
 <span class="error"><?php echo $emailErr;?></span>
<br><br><label for="comment">*Comments:</label>
<textarea name="comment" id="comment" value="<?php echo $comment;?>"></textarea>
 <span class="error"><?php echo $commentErr;?></span>
<br>
<input id="submitbutton" type="submit" value="Send Now" name="submit">
<br>
</form>
</div>

</div>
</body>
</html> 