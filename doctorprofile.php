<?php

    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');
    if(!isset($_SESSION['user_login']))
    {
        header('location: doctorlogin.php');
    }

    $session_user =  $_SESSION['user_login'];

    echo $session_user;

    $user_data = mysqli_query($connect,"SELECT * FROM `doctorinfo` WHERE `phonenumber` = '$session_user' ");


    $user_row = mysqli_fetch_assoc($user_data);


    

    if(array_key_exists('patientlist', $_POST)) {
   
    $sql = "SELECT * FROM `appointmentlist` where `phonenumber` = '$session_user' ";   
    $result = mysqli_query($connect, $sql); 
    
    //$row = mysqli_fetch_assoc($result);
    //echo $row['patientphonenumber'];
    // echo "<input type='text' placeholder='Doctor Phone Number' name='phonenumber'>";
    /*
        echo "<form action='home.php' method='post' >";
      echo "<input type='text' placeholder='Doctor Phone Number' name='phonenumber'>";
      echo "<input type='text' placeholder='Patient phone number' name='patientphonenumber'>"; 
      echo "<input type='submit' name='button2' value='submit'>";
      echo "</form>";

    */

        /*if(mysqli_num_rows($result) > 0) 
        {  
            while($row = mysqli_fetch_array($result))  
            {  // echo "<table>";
                echo $row["patientphonenumber"];
               // echo "<br>";

               // echo "</table>";
            }
                               
        }*/

        
    
    }

    if(isset($_POST['logout']))
    {
      
    session_start();
    session_destroy();
    header('location: doctorlogin.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="profile.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-user">
                            <p>Doctor Name : <?= $user_row['username'] ?></p>
                            <p><?= $user_row['doctorate'] ?></p>
                            <p>Specialist At : <?= $user_row['specialist'] ?></p>
                            <p>Phone Number : <?= $user_row['phonenumber'] ?></p>
                            
                            
                            
                            
					</div>
				</div>
                
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
                <form action="doctorprofile.php" method="post">
                    <div class="profile-userbuttons">
                        <button type="submit" class="btn btn-success btn-sm" name="patientlist">Patient List</button>
                        <button type="submit" class="btn btn-danger btn-sm">Message</button>
                               <br><br>
                        <button type="submit" class="btn btn-danger btn-sm" name="logout">LogOut</button>
                    </div>

                </form>

                <!--table -->
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  <th>Patient Name</th>
                               <th>Patient Phone Number</th>  
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($GLOBALS['result']) > 0)  
                          {  
                               while($row = mysqli_fetch_array($GLOBALS['result']))  
                               
                               {  
                          ?>  
                          <tr>  
                                <td>Patient Name</td>
                               <td><?php echo $row["patientphonenumber"];?></td>  
                               
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  




                <!-- table end>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		
	</div>
</div>
<br>
<br>
</body>
</html>