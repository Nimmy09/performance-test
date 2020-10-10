
<?php
    $con = new mysqli("localhost","root","","nimmyislam");   /* Connection code(Connect with database) */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Data</title>
    <style>
	body {
  background-image: url('pink.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%  ;

}
        body{
            margin: 10% auto 0;
        }
        td{
            text-align: center;
        }

* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  height: 33.33%;
  padding: 5px;
}


.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
    
</head>
<body>
<?php

echo "<a href='addbook.php'>add catagory</a> | <a href='displaybook.php'>view product</a> |  <a href='registration.php'>home</a> ";
?>



<br></br>

<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">search
                <span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
<br></br>

		
	</div>




<br><h1>SELECT BOOK :- </h1></br>


    
   <?php
	/* Fetch data from databse(select query) */
            $res = $con->query("select * from tblregistration") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($res))
            {
        ?>
        
           <div class="row">
  <div class="column">
  <a href="catagory.php?id=<?php echo $row["id"]; ?>">
    <img src="images/<?php echo $row["RegProfile"]; ?>" height="520" width="380" alt="User image"><br>
       
  
           
       <?php echo $row["RegFullName"]; ?><br>
            <?php echo $row["RegDes"]; ?><br>
            <a href="registration.php?isEdit=<?php echo $row["RegFullName"]; ?>">Edit</a> | <a href="?delete=<?php echo $row["RegFullName"]; ?>">Delete</a><br>
        </div>
        <?php
            }
        ?>
    </table>
    
      <?php
	/* Delete code.Wehen click on delete link this will perform.!*/
        if(isset($_REQUEST["delete"]))
        {$query2="select RegProfile from tblregistration where RegFullName='".$_REQUEST["delete"]."'";
            $result=mysqli_query($con,$query2) or die(mysqli_error($con));
            while($row1=mysqli_fetch_array($result))
            {
                $image1=$row1["RegProfile"];
            }
            unlink("images//".$image1);
			$query3="delete from tblregistration where RegFullName='".$_REQUEST["delete"]."'";
            mysqli_query($con,$query3) or die(mysqli_error($con));
            echo "<script>alert('Data deleted successfully..!');window.location='addbook.php';</script>";   
        }
    ?>




</body>
</html>
