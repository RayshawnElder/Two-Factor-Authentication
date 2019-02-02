<?php

define('SERVERDB_Location', '198.71.227.94');
define('USERNAMEDB_Cred', 'user1');
define('PASSWORDDB_Cred', 'dbpepuser1');
define('DATABASE', 'Kumar933_');

$db = mysqli_connect(SERVERDB_Location,USERNAMEDB_Cred,PASSWORDDB_Cred,DATABASE);

if(isset($_POST["submit"]))
{

$UN = $_POST["UserID"];
$RegValid = $_POST["VerifyCode"];

$UN = mysqli_real_escape_string($db, $UN);
$RegValid = mysqli_real_escape_string($db, $RegValid);

// run query here
$query = "SELECT UserID, RegValid FROM users";

$RegValid = $_POST["VerifyCode"];

if($result = mysqli_query ($query))  {
  while($row = mysqli_fetch_array($query))
	{
	if ($UN ==$row['UserID'] && $RegValid==$row['RegValid'])
		{
			echo "Your account has been authenticated, welcome<BR>";
			exit; 
		}
	}
	echo "User ID & Registration code don't match.<BR>";
	}
}
?>