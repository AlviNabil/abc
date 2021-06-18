<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>

<?php
include_once "header.php"
?>


<body>
    <?php
    include "head.php"
    ?>
    <div class="mid">
        <div class="wrapper">
            <section class="form signup">
            <?php
                    include_once "PHP/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM patient WHERE unique_id = {$_SESSION['unique_id']} ");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>
                <header>Edit Profile</header>
                <form action="#" enctype="multipart/form-data" method="POST">
                    <div class="error-txt">This is an error message!</div>
                    <div class="name-details">


                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="fname" value="<?php echo $row['fname']?>" required>
                        </div>


                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $row['lname']?>"" required>
                        </div>
                    </div>

                    <div class="field input">
                        <label>Email Adress</label>
                        <input type="text" name="email" value="<?php echo $row['email']?>" required>
                    </div>


                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $row['password']?>" required>
                        <i class="fas fa-eye"></i>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>


                </form>
                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                <div class="alter-signup">


                    <div class="field link">
                        <a href="../Doctor/index.php">Signup as Doctor?</a>
                    </div>


                    <div class="field link">
                        <a href="../Doctor/login.php">Login as Doctor</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="JavaScript/pass_showHide.js"></script>
    <script src="JavaScript/update.js"></script>
</body>


</html>