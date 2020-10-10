<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['emailaddress'];
  $pass = $_POST['psw'];
	
	if($name == ""  || $username == "" || $pass == "" || $email == "") {
echo "All fields should be filled. Either one or many fields are empty.";}
$insert="INSERT INTO registration2(Name,	Username,	Email,	Password) VALUES('$name', '$username', '$email', md5('$pass'))";




if (mysqli_query($mysqli, $insert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($mysqli);
}

}


?>


?>