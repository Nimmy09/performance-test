
<?php

$databaseHost='localhost';
$databaseName='nimmyislam';
$databaseUsername='root';
$databasePassword='';
$cont=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$cont){
	die("Connection failed: ".mysqli_connect_error());
}
else{
 echo"Connected Successfully";
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Library Managemant</title>
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


    <?php
          if(isset($_POST['search'])){
            $on=$_POST['bookdata'];
            $query = "SELECT * FROM book WHERE name= '$on' or pbdate='$on' or isbn='$on'";
            $data=mysqli_query($cont,$query);
            if($data){
            $track_data = mysqli_fetch_assoc($data);
            
        ?>
        
        <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Book Information</p>
                                    </div>

    <table class="table table-bordered text-center mt-5">
      <!--<thead>
        <tr>
          <th>Process</th>
          <th>Status</th>
        </tr>
      </thead>-->
      <tbody>
      
        <tr>
          <td class="py-5">Book Name</td>
          <td class="py-5"><?php echo $track_data['name'];?></td>
        </tr>
        <tr>
          <td class="py-5">Publisher Name</td>
          <td class="py-5"><?php echo $track_data['pbname'];?></td>
        </tr>
        <tr>
          <td class="py-5">Author Name</td>
          <td class="py-5"><?php echo $track_data['pbdate'];?></td>
        </tr>
        <tr>
          <td class="py-5">ISBN</td>
          <td class="py-5"><?php echo $track_data['isbn'];?></td>
        </tr>
        <tr>
          <td class="py-5">Edition</td>
          <td class="py-5"><?php echo $track_data['edition'];?></td>
        </tr>
        
      </tbody>
      <?php
      //  }
      ?>
    </table>
            <?php }
            else{  ?>
    <p class="text-center">NO Order Found!</p>
   <?php } 
   }
   ?>

<form action="" method="post">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Borrow BOOK</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Book ISBN" name="isbn">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter User ID" name="user"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <select name="ncopy">
                                    <option value="">Enter number of copies</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                </div>
        
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Current Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="cd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Return Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="rd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="Borrow" name="borrow" required>
                                    </div>
                                    
                                </div>
                            </form>


<?php

if(isset($_POST['borrow'])){
	$id=$_POST['user'];
    $isbn=$_POST['isbn'];
    $ncopy=$_POST['ncopy'];
    $cd=$_POST['cd'];
    $rd=$_POST['rd'];
    
	if($id=="" || $cd=="" || $ncopy=="" || $rd=="" || $isbn==""  ){
		echo "All fields should be filled.Either one or many fields are empty.";
    }
    else{

      $inst2="SELECT * FROM `tbl_book` WHERE isbn='$isbn'"; 
          $data2=mysqli_query($cont,$inst2);
          $row = mysqli_fetch_assoc($data2);
          $oncopy=$row['ncopy'];    
      
          
          if($oncopy!= 0){
            $inst="INSERT INTO tbl_borrow(userid,isbn,cd,rd,ncopy) VALUES('$id','$isbn','$cd','$rd','$ncopy')"; 
          $data=mysqli_query($cont,$inst);  
            $nncopy=$oncopy-$ncopy;
              
              if($data == TRUE)
                        {
                            $inst1="UPDATE tbl_book set ncopy='$nncopy' WHERE isbn='$isbn' "; 
                            $dataX=mysqli_query($cont,$inst1);
                            echo "<script>alert('Data updated successfully..!');</script>";   
                        }
                else{echo mysqli_error($cont);}
          }
          else {
            echo "<script>alert('bOOK nOT available..!');</script>";
          }
    }
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>