<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');
    if(isset($_POST['submit'])) //for register
    {
        
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $bloodgroup = $_POST['bloodgroup'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `patientinfo`(`username`,`phonenumber`,`bloodgroup`,`password`) VALUES('$username','$phonenumber','$bloodgroup','$password')";
        $result = mysqli_query($connect,$sql);
        if($result)
        {
            echo "Data Save Successfully";
        }
        else{
            echo "Failed";
        }
       
    }

    else{
        if(isset($_SESSION['patient_login']))
        {
            header('location: home.php');
        }

        if(isset($_POST['login'])) //login
        {
            $phonenumber = $_POST['phonenumber'];
            $password = $_POST['password'];
            $sql1 = "SELECT * FROM `patientinfo` WHERE `phonenumber` = '$phonenumber' AND `password`='$password' ";
            $result1 = mysqli_query($connect,$sql1);
            $row = $result1->fetch_assoc();
            if($row['phonenumber']==$phonenumber && $row['password']==$password)
            {
                $_SESSION['patient_login'] = $phonenumber;
                header('location: home.php');
                
            }
            else{
                echo "Try Again";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Patient</title>
</head>
<body>
    <div class="back">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type = "button" class="toggle-btn" onclick="login()">Log In</button>
                <button type = "button" class="toggle-btn" onclick="register()">Register</button>

            </div>

        
        <form action="patientlogin.php" method="post" id="login" class="input-group">
            <input type ="text" class="input-field" name="phonenumber" placeholder="Phone Number" required>
            <input type ="text" class="input-field" name="password" placeholder="Password" required>
            <button name="login" type = "submit" class="submit-btn">Login</button>
        </form>

        <form action="patientlogin.php" method="post" id="register" class="input-group">
            <input type ="text" class="input-field-r" name="username" placeholder="User Name" required>
            <input type ="text" class="input-field-r" name="phonenumber" placeholder="Phone Number" required>
            <input type ="text" class="input-field-r" name="bloodgroup" placeholder="Blood Group" required>
            <input type ="text" class="input-field-r" name="password" placeholder="Password" required>
            <button name="submit" type = "submit" class="submit-btn">Register</button>
        </form>
        </div>
        
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register()
        {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login()
        {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }

    </script>
    
</body>
</html>