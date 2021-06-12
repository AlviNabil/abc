
<!DOCTYPE html>
<html>
    <head>
    <title>Hospital Details</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h2>LOGO</h2>
        </header>
        <div class="nav">
            <a href="hospitalprofile.php">Home</a>
            <a href="admin.php">Hospital Registration</a>
            <a href="adminlogin.php">Login</a>
            <a href="#">Doctor Info</a>
            
        </div>
        <br><br>
        <div>
        <table class="table table-hover">
            <thead>
                <tr>
                <td>Hospital Name</td>
                <td>ICU Quanity</td>
                <td>Bed Quanity</td>
                <td>Doctor Quanity</td>
                <td>Fill Up ICU</td>
                <td>Fill Up Bed</td>
                <td>Available ICU</td>
                <td>Available Bed</td>
                <td>Hospital Address</td>
                </tr>
                <br>
            </thead>
            <tbody>
            <?php
                $connect = mysqli_connect("localhost","root","","hospital");
                $query = "SELECT * FROM hospitalkuet";
                $result = mysqli_query($connect,$query);

                if(mysqli_num_rows($result)>0)
                {
                    foreach($result as $row){
                    ?>
                    <tr>
                    
                    <td><?= $row['hospitalname']; ?></td>
                    <td><?= $row['icuquantity']; ?></td>
                    <td><?= ($row['bedquantity']); ?></td>
                    <td><?= ($row['doctor']); ?></td>
                    <td><?= ($row['fillicu']); ?></td>
                    <td><?= ($row['fillbed']); ?></td>
                    <td><?= abs(floor(($row['icuquantity'])-($row['fillicu']))); ?></td>
                    <td><?= abs(floor(($row['bedquantity'])-($row['fillbed']))); ?></td>
                    <td><?= ($row['address']); ?></td>
                    </tr>
                    <?php
                    }
                }
                else{
                    echo "No data found";
                }
                ?>



        </tbody>
        </table>

        </div>
    </body>

</html>



