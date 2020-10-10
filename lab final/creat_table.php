<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
  $address = $_POST['address'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $phonenumber = $_POST['phonenumber'];
  $age = $_POST['age'];
  $email = $_POST['emailaddress'];
  $pass = $_POST['psw'];
	
	if($name == ""  || $address == "" ||$street == "" || $city == "" || $phonenumber == "" || $age == "" || $email == "" || $pass =="") {
echo "All fields should be filled. Either one or many fields are empty.";}
$insert="INSERT INTO usertable(Name, Address, Street, City, Phonenumber,	Age,	Email,	Password) VALUES('$name', '$address', '$street', '$city', '$phonenumber', '$age',  '$email', md5('$pass'))";




if (mysqli_query($mysqli, $insert)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert . "<br>" . mysqli_error($mysqli);
}

}


?>