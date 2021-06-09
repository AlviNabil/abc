<?php
    session_start();
    $connect = mysqli_connect('localhost','root','','projectkuet');
    $session_user =  $_SESSION['blooduser_login'];

    //echo $session_user;

    $blood_user_data = mysqli_query($connect,"SELECT * FROM `blood` WHERE `phonenumber` = '$session_user' ");


    $blood_user_row = mysqli_fetch_assoc($blood_user_data);
?>

<html>
    <head>
        <title>Blood Profile</title>
    </head>
    <body>
    <form action="bloodprofile.php" method="POST"> 
    <input type ="text"  name="name" value="<?= $blood_user_row['name'] ?> ">
    <br>
    <input type="text" name="bloodgroup" value="<?= $blood_user_row['bloodgroup'] ?> ">
    <br>
    <input type="date" name="lblood" value="<?= $blood_user_row['lblood']; ?>">
    <br>
    <input type="date" name="cblood" value="<?= date('Y-m-d'); ?>">
    <br>
    <input type="submit" name="update" value="Update Data"/><br>
    </form>

    </body>
</html>

<?php
    $connect = mysqli_connect("localhost","root","","projectkuet");
    //$query = "INSERT INTO birth (name,current,latest) VALUES ('$name','$timee1','$datee1')";

    //$result = mysqli_query($connect,$query);

    if(isset($_POST['update']))
    {
        
        $name=$_POST['name'];
        $lblood=$_POST['lblood'];
        $cblood=$_POST['cblood'];
       
        $query = "UPDATE `blood` SET name='$name',lblood='$lblood',cblood='$cblood' where phonenumber='$session_user' ";
        $result = mysqli_query($connect,$query);

        if($result)
        {
            echo "Data Update";
            header('location: bloodprofile.php');
            echo '<script type="text/javascript">alert("Data Update")</script>';
            

        }
        else{
            echo '<script type="text/javascript">alert("Data Not  Update")</script>';

        }
    }

?>