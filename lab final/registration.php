
<!DOCTYPE html>
<html>
<head>

<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="registration.php">REGISTRATION</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addbook.php">ADD BOOK </a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="displaybook.php">VIEW BOOKS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="borrow.php">BORROW BOOKS</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#">RETURN BOOKS</a>
    </li>
  </ul>
</nav>
<br>


	<title>registration form creation</title>
	


</head>
<body>




	<h1>Create an account</h1>
	<div class="register">
		
		<form id ="register" method="post" action="creat_table.php">
			<h2>Registration Form</h2>
		<label> Name :</label><br>
			<input type="text" name="name" id="name" placeholder="Enter Full Name"><br><br>
			<label>Address :</label><br>
			<input type="text" name="address" id="address" placeholder="Address"><br><br>
			<label>Street :</label><br>
			<input type="text" name="street" id="street" placeholder="Street "><br><br>
			<label>City :</label><br>
			<input type="text" name="city" id="city" placeholder="City "><br><br>
			<label>Phone Number:</label><br>
			<input type="number" name="phonenumber" id="phonenumber" placeholder="Phone Number "><br><br>
			<label>Age :</label><br>
			<input type="num" name="age" id="age" placeholder="Age "><br><br>
			<label>Address :</label><br>
			<label>Email :</label><br>
			<input type="email" name="emailaddress" id="name" placeholder="Enter your Email"><br><br>
			<label>password :</label><br>
			<input type="password" id="psw" name="psw" placeholder="Enter your Password"><br><br>
			
			<input type="submit"value="submit" name="submit"><br><br>

		 <a class="text-white" href="userlogin.php">SIGN IN</a>
    </p>
		</form>
	</div>

</body>
</html>