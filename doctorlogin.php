<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');
    if(isset($_POST['submit'])) //for register
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $doctorate = $_POST['doctorate'];
        $specialist = $_POST['specialist'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `doctorinfo`(`email`,`username`,`phonenumber`,`doctorate`,`specialist`,`password`) VALUES('$email','$username','$phonenumber','$doctorate','$specialist','$password')";
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
    if(isset($_SESSION['user_login']))
    {
        header('location: doctorprofile.php');
    }

    if(isset($_POST['login'])) //login
    {
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $sql1 = "SELECT * FROM `doctorinfo` WHERE `phonenumber` = '$phonenumber' AND `password`='$password' ";
        $result1 = mysqli_query($connect,$sql1);
        $row = $result1->fetch_assoc();
        if($row['phonenumber']==$phonenumber && $row['password']==$password)
        {
            $_SESSION['user_login'] = $phonenumber;
            header('location: doctorprofile.php');
            
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
    <title>Doctor</title>
</head>
<body>
    <div class="back">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type = "button" class="toggle-btn" onclick="login()">Log In</button>
                <button type = "button" class="toggle-btn" onclick="register()">Register</button>

            </div>

        
        <form action="doctorlogin.php" method="post" id="login" class="input-group">
            <input type ="text" class="input-field" name="phonenumber" placeholder="Phone Number" required>
            <input type ="text" class="input-field" name="password" placeholder="Password" required>
            <button name="login" type = "submit" class="submit-btn">Login</button>
        </form>

        <form action="doctorlogin.php" method="post" id="register" class="input-group">
            <input type ="email" class="input-field-r" name="email" placeholder="Email" required>
            <input type ="text" class="input-field-r" name="username" placeholder="User Name" required>
    
            <input type ="text" class="input-field-r" name="phonenumber" placeholder="Phone Number" required>
            <input type ="text" class="input-field-r" name="doctorate" placeholder="Doctorate" required>
            <input type ="text" class="input-field-r" name="specialist" placeholder="Specialist" required>
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