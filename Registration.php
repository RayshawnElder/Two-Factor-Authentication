<html>
<head>
<title> Registration </title>
</head>
<body>

<?php
include 'randomstr.php';

define('SERVERDB_Location', '198.71.227.94');
define('USERNAMEDB_Cred', 'user1');
define('PASSWORDDB_Cred', 'dbpepuser1');
define('DATABASE', 'Kumar933_');

$db = mysqli_connect(SERVERDB_Location,USERNAMEDB_Cred,PASSWORDDB_Cred,DATABASE);

if(isset($_POST["submit"]))
{
$UN = $_POST["UserID"];
$FN = $_POST['FirstName'];
$LN = $_POST['LastName'];
$email = $_POST['Email'];
$address1 = $_POST['StreetNum'];
$address2 = $_POST['StreetName'];
$city = $_POST['City'];
$phone = $_POST['phone'];
$zipcode = $_POST['ZipCode']; 
$state = $_POST['State'];

//inject prevention pre hash
$UN = mysqli_real_escape_string($db, $UN);
$FN = mysqli_real_escape_string($db, $FN);
$LN = mysqli_real_escape_string($db, $LN);
$email = mysqli_real_escape_string($db, $email);
$address1 = mysqli_real_escape_string($db, $address1);
$address2 = mysqli_real_escape_string($db, $address2);
$city = mysqli_real_escape_string($db, $city);
$phone = mysqli_real_escape_string($db, $phone);
$zipcode = mysqli_real_escape_string($db, $zipcode);
$state = mysqli_real_escape_string($db, $state);

$Vcode = generateRandomString();
//hash goes here

// running query here
$query = mysqli_query ($db, "INSERT INTO users (UserID, FirstName, LastName, Email, StreetNum, StreetName, City, State, ZipCode, Phone, RegValid)VALUES ('$UN','$FN','$LN','$email','$address1','$address2','$city','$state','$zipcode','$phone','$Vcode')");
	// the message
$msg = "Your code is: ".($Vcode)." . Enter it to finish the account creation process.";
	// send email
mail($email,"Pepboys verification",$msg);

if($query)
	{
	echo "Thank You! you are now registered.";
	header('Location: http://www.pepboystools.us/Verification.html');
		exit; 
//jump to next page 
	}
else
	{
	echo "Registration Failed !";
	}
}

?>

</body>
</html>
