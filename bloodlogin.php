<?php
session_start();
$connect = mysqli_connect('localhost','root','','projectkuet');

if(isset($_POST['login'])) //login
    {
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $sql1 = "SELECT * FROM `blood` WHERE `phonenumber` = '$phonenumber' AND `password`='$password' ";
        $result1 = mysqli_query($connect,$sql1);
        $row = $result1->fetch_assoc();
        if($row['phonenumber']==$phonenumber && $row['password']==$password )
        {
            $_SESSION['blooduser_login'] = $phonenumber;
            header('location: bloodprofile.php');
        }
        else{
            echo "Try Again";
        }
    }

?>

<html>
    <head>
        <title>Updation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
       
       
        <style>
            body{
                background-color: whitesmoke;
            }
            input{
                width: 20%;
                height: 5%;
                border: 2px;
                border-radius: 5px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 15px 0px;
                box-shadow: 1px 1px 2px 1px gray;
            }
        </style>
        
    </head>

    <body>
        <center>
            <h1>
                Updation of Data into Database using php
            </h1>
            <form action="bloodlogin.php" method="POST">
               
                <input type="text" name="phonenumber" placeholder="Enter Your Phone Number" required/><br>
        
                <input type="text" name="password" placeholder="Enter Your Password" required/></br>
                
                <input type="submit" name="login" value="login"/><br>
            
            </form>
        </center>
        </body>
</html>
