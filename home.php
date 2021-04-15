<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');

    if(!isset($_SESSION['patient_login']))
    {
        header('location: patientlogin.php');
    }

    $session_user =  $_SESSION['patient_login'];
    echo $session_user; //new code for patient id
    echo "<br>";
     if(array_key_exists('button1', $_POST)) {
        button1();
     }
     
     function button1() {
        
      echo "<form action='home.php' method='post' >";
      echo "<input type='text' placeholder='Doctor Phone Number' name='phonenumber'>";
      echo "<input type='text' placeholder='Patient phone number' name='patientphonenumber'>"; 
      echo "<input type='submit' name='button2' value='submit'>";
      echo "</form>";
    }

    if(isset($_POST['button2']))
    {
      $phonenumber = $_POST['phonenumber'];
      echo "$phonenumber";
      $patientphonenumber = $_POST['patientphonenumber'];
      echo "$patientphonenumber";
      $sql1 = "INSERT INTO `appointmentlist`(`phonenumber`, `patientphonenumber`) VALUES ('$phonenumber','$patientphonenumber')";
      $result1 = mysqli_query($connect,$sql1);
      if($result1)
      {
          echo "Data Save Successfully";
      }
      else{
        echo "Error";
      }

    }
   

?>


<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <title>Responsive Navbar | CodingNepal</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">MedicO</label>
      <!--
      <ul>
        <li><a class="active" href="home.php">Doctor List</a></li>
      </ul>
      -->
    </nav>
    <section>
        <?php

        $result2 = mysqli_query($connect,"SELECT * FROM `doctorinfo`");
        while($row=mysqli_fetch_assoc($result2)){
            ?>
        <div class="card">
           
            <img src="avatar.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b><?php echo $row['username'];?></b></h4> 
                    <h4><b><?php echo $row['phonenumber']; ?></b></h4> 
                    
                    <h4><b><?php echo $row['specialist']; ?></b></h4> 
 
                    
                </div>
                <form method="post">
                      <input type="submit" name="button1" class="button" value="Button" />
                  </form>
          
        </div>
        <?php
        }
        ?>

    </section>
    <!--
    <footer class="footer-bottom">
        
            <p>copyright &copy;2020  designed by <span>Machine</span></p>
       
    </footer>
     -->
  </body>
</html>
