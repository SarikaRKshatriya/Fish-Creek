<!--This is subscibe.php -->


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
  //catch exception if connection fails
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
$nameErr=$addressErr=$petErr=$emailErr=$passwordErr=$phoneErr=$serviceErr=$hash="";
$petid=$clientid=$serviceid=$dbemail=$dbclientid=$dbserviceid=$dbpetid="";
$name=$email=$address=$password=$phone=$pet="";
$flag=1;
$petname="Pet Name";
$servicename="Service Name";
//check validations
if (isset($_POST['submit']))
{
	if(empty($_POST["name"]))//name should not be empty
	{
		$nameErr="Name should not be empty";
    $flag=0;
	}
	else
	{
    $name = test_input($_POST["name"]);
  }
	
	if (empty($_POST["address"]))//should not be empty
	{
    	$addressErr = "Address should not be empty";
      $flag=0;
  } 
 	else
	{
    $address = test_input($_POST["address"]);
   }
    $email = test_input($_POST["email"]);
 	if (empty($_POST["email"]))//should not be empty
	 {
    	$emailErr = "Email should not be empty";
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
  $password = test_input($_POST["password"]);
 	if (empty($_POST["password"]))
	{
   	$passwordErr = "Password should not be empty";
    $flag=0;
  } 
  elseif(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z]{8,16}$/', $password))
  {  
    	// check if e-mail address is well-formed
      		$passwordErr = "Invalid Password format"; 
          $flag=0;
     
   }
   else
   {
    $password = test_input($_POST["password"]);
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
  }
 	$phone = test_input($_POST["phone"]);
  if (empty($_POST["phone"]))
	{
    	$phoneErr = "phone should not be empty";
      $flag=0;
  } 
  elseif(!preg_match("/^[1-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) 
  {  	
    	// check if e-mail address is well-formed
    $phoneErr = "Invalid phone format"; 
    $flag=0;
  }
    $service = test_input($_POST["service"]);
  if(strcmp($service,$servicename)==0)
	{
		$serviceErr="Type of Service should not be empty";
    $flag=0;
	}
	else
	{
    $service = test_input($_POST["service"]);
   
  }
  $pet = test_input($_POST["pet"]);
  
  if(strcmp($pet,$petname)==0)
  {
    $petErr="Type of Pet should not be empty";
    $flag=0;
  }
  else
  {
    $pet = test_input($_POST["pet"]);
   
  }
if(($flag==1))
{
  //echo "processing form";
//check if the entered email id alredy present
$sql="SELECT email from client where email='$email'";
$result=$conn->query($sql);
while($row=$result->fetch())
{
  $dbemail=$row['email'];
}
//echo $dbemail;
//if client email already resent get clientid
if(strcmp($dbemail,$email)==0)
{
  $clientidquery="SELECT clientid from client where email='$email'";
  $clientid=$conn->query($clientidquery);
  echo "client already exists.";
}
else
  //if client id not present insert new row in client table.
{
  $conn->query("INSERT INTO client (name,address,phone,email,password) VALUES ('$name','$address','$phone','$email','$hash')");
//  echo "added info in client table.";
}
//get clientid
$clientidquery="SELECT clientid from client where email='$email'";
$clientid=$conn->query($clientidquery);
while($row=$clientid->fetch())
{
  $dbclientid=$row['clientid'];
}
//get serviceid
$serviceidquery="SELECT serviceid from service where servicename='$service'";
$serviceid=$conn->query($serviceidquery);
while($row=$serviceid->fetch())
{
  $dbserviceid=$row['serviceid'];
}
//get petid
$petidquery="SELECT petid from pet where petname='$pet'";
$petid=$conn->query($petidquery);
while($row=$petid->fetch())
{
  $dbpetid=$row['petid'];
}
//get current date
$date=date("Y-m-d");
$clientquery="INSERT INTO subscription (clientid,serviceid,petid,date) VALUES ('$dbclientid','$dbserviceid','$dbpetid','$date')";
$conn->query($clientquery);
echo "info added.";
//close connection and free resources
//$pdo=null;
}
else
{
  echo "<script type='text/javascript'>alert('Please provide required information.');</script>";
  //echo "Please provide required information";
}
}
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
<h3 id="subhead">Subscribe Fish Creek</h3><br>
<p>Required fields are marked with an asterisk(*).</p>
<br>
<!-- create form and remove html validation-->
<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>" novalidate>
<label for="name">* Client Full Name:</label>
<input type="text" name="name" placeholder="Enter name"value="<?php echo $name;?>">
<span class="error"><?php echo $nameErr;?></span><br>
<label for="add">* Address:</label>
<input type="text" name="address" placeholder="Enter address"value="<?php echo $address;?>">
<span class="error"><?php echo $addressErr;?></span>
<br>
<label for="email">* E-mail:</label>
<input type="email" name="email" placeholder="Enter email"value="<?php echo $email;?>">
<span class="error"><?php echo $emailErr;?></span>
<br>
<label for="password">* Password:</label>
<input type="password" name="password" placeholder="Enter password"value="<?php echo $password;?>">
<span class="error"><?php echo $passwordErr;?></span>
<br>
<label for="phone">* Phone:</label>
<input type="number" name="phone" placeholder="Enter phone"value="<?php echo $phone;?>">
<span class="error"><?php echo $phoneErr;?></span><br>
<label>*Type of Service:</label>
<select name="service" id="service">
<option>Service Name</option>
<?php 
//retrieve info from service table
$sql="SELECT servicename from service";
$result=$conn->query($sql);
while($row=$result->fetch())
    {
    	$service=$row['servicename'];
    	$menu="<option>" .$service."</option>";
    	 echo $menu;

    }
 ?>
</select>

<span class="error"><?php echo $serviceErr;?></span><br>
<br>
<label>* Pet:</label>
<select name="pet" id="pet" style="width:120px">
<option>Pet Name</option>
<?php 
//retrieve info from pet table
$sql2="SELECT petname from pet";
$result2=$conn->query($sql2);
while($row=$result2->fetch())
    {
    	$pet=$row['petname'];
    	$menu2="<option>" .$pet."</option>";
    	 echo $menu2;

    }
 ?>
</select>
<span class="error"><?php echo $petErr;?></span><br><br><br>
<input name="submit" id="submitbutton" type="submit" value="Send Now">

</form>
<br><br><br>
<footer>
	Copyright © 2016 Fish Crrek Animal Hospital<br>
	<a href="mailto:sarika.kshatriya@mavs.uta.edu">sarika@kshatriya.com</a>
</footer>
<br>
</div>
</div>
</body>
</html> 