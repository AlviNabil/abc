<html>
    <head>
        <title>Blood List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
       
    </head>
    <body>
        <table class="table table-hover">
            <thead>
                <tr>
                <td>Name</td>
                <td>Phone Number</td>
                <td>Last Donate</td>
                <td>Current Date</td>
                <td>Difference</td>
                </tr>
                <br>
            </thead>
            <tbody>
            <?php
                $connect = mysqli_connect("localhost","root","","projectkuet");
                $query = "SELECT * FROM blood";
                $result = mysqli_query($connect,$query);

                if(mysqli_num_rows($result)>0)
                {
                    foreach($result as $row){
                    ?>
                    <tr>
                    
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['phonenumber']; ?></td>
                    <td><?= ($row['lblood']); ?></td>
                    <td><?= ($row['cblood']); ?></td>
                    <td><?= abs(floor((strtotime($row['cblood'])-strtotime($row['lblood']))/(60*60*24))); ?></td>
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
    </body>
</html>