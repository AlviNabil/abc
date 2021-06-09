<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');
    if(isset($_POST['register'])) //for register
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $bloodgroup = $_POST['bloodgroup'];
        $phonenumber = $_POST['phonenumber'];
        $lblood=$_POST['lblood'];
        $cblood=$_POST['cblood'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `blood`(`id`,`name`,`bloodgroup`,`phonenumber`,`lblood`,`cblood`,`password`) VALUES('$id','$name','$bloodgroup','$phonenumber','$lblood','$cblood','$password')";
        $result = mysqli_query($connect,$sql);
        if($result)
        {
            echo '<script type="text/javascript">alert("Data Inserted")</script>';

        }
        else{
            echo '<script type="text/javascript">alert("Try Again")</script>';

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
            <form action="blood.php" method="POST">
                <? php date_default_timezone_set('Asia/Dhaka'); ?>
                <input hidden type="text" name="id" placeholder="Emp Id"/><br>
                <input type="text" name="name" placeholder="Enter Your Name" required/><br>
                <input type="text" name="bloodgroup" placeholder="Enter Your Blood Group" required/><br>
                <input type="text" name="phonenumber" placeholder="Enter Your Phone Number" required/><br>
                <input type="date" name="lblood" placeholder="Last Donate"/><br>
                <input  type="date" name="cblood" value="<?= date('Y-m-d'); ?>"/><br>
                <input type="text" name="password" placeholder="Enter Your Password" required/></br>
                
                <input type="submit" name="register" value="Registration"/><br>
            
            </form>
        </center>
        </body>
</html>
