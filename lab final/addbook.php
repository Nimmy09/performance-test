<?php
    $con = new mysqli("localhost","root","","nimmyislam");   /* Connection code(Connect with database) */
	echo "<a href='displaybook.php'>view catagory</a>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registartion</title>
    <style>
	body {
  background-image: url('pink.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%  ;

}
	
        input[type=text],input[type=email],input[type=password]{
            width:100% !important;
        }
        table{
            border: 1px solid rgb(202,207,210);
        }
        form {
            margin: 10% auto 0;
        }
    </style>
</head>
<body>
   
  
    
    /* Insert form */
    <form method="post" enctype="multipart/form-data">
       <center><h1>ADD BOOK</h1></center>
        <table align="center" border="0">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="txtfname"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="10" cols="75" name="txtfdes" placeholder="Details..."></textarea></td>
            </tr>
            
            <tr>
                <td>Profile Picture:</td>
                <td><input type="file" name="profile"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Insert" name="btninsert"></td>
            </tr>
        </table>
    </form>
    <?php  ?>
  
    <?php
	/* Insert Code Start */
        if(isset($_POST["btninsert"]))   /* Insert button click event */
        {
	    /* Move image into images folder which you have to create in C:\xampp\htdocs\foldername\ */
            move_uploaded_file($_FILES["profile"]["tmp_name"],"images/".$_FILES["profile"]["name"]); 
			$image1=$_FILES["profile"]["tmp_name"];
			echo($image1);
	    $image=$_FILES["profile"]["name"];
		echo($image);
	    
		  $query1="insert into tblregistration(RegFullName,RegDes,RegProfile) values('".$_POST["txtfname"]."','".$_POST["txtfdes"]."','".$image."')";
            $res = mysqli_query($con,$query1) or die(mysqli_error($con));
            if($res == TRUE)
            {
                echo "<script>alert('Data added successfully..!!')</script>";
            }
            else
            {
                echo "<script>alert('Something getting wrong.Please try again..!')</script>";
            }
        }
	/* Insert Code End */
    ?>
</body>
</html>