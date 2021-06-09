<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: user.php");
    }
?>
<?php
    include_once "header.php"
?>


<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Signup as Patient</header>
            <form action="#" enctype="multipart/form-data" method="POST">
                <div class="error-txt">This is an error message!</div>
                <div class="name-details">


                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>


                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="field input">
                    <label>Email Adress</label>
                    <input type="text" name="email" placeholder="Enter Your Email" required>
                </div>


                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new Password" required>
                    <i class="fas fa-eye"></i>
                </div>


                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" required>
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
    <script src="JavaScript/pass_showHide.js"></script>
    <script src="JavaScript/signup.js"></script>
</body>


</html>