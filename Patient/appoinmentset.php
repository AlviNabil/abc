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
            <section class="form login">
                <header>Login as Patient</header>
                <form action="#">
                    <div class="error-txt"></div>


                    <div class="field input">
                        <label>Name</label>
                        <input type="text" name="email" placeholder="Enter Your Name">
                    </div>
                    <div class="field input">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Enter Your Email">
                    </div>


                    <div class="field input">
                        <label>Address</label>
                        <input type="text" name="text" placeholder="Enter your Address">
                    </div>
                    <div class="field input">
                        <label>Date</label>
                        <input type="date" name="date" placeholder="Select Date">
                    </div>
                    
                    <div class="field input">
                        <label>Appoinment Time</label>
                        
                        <select id="time">

                            <option value="1">10:00AM-11:30AM</option>
                            <option value="2">11:40AM-1:00PM</option>
                            <option value="3">4:00PM-5:30PM</option>
                            <option value="4">5:40PM-7:00PM</option>
                            <option value="5">7:10PM-8:30PM</option>
                            <option value="" hidden disable selected>Select an option</option>
                        </select>
                    </div>
                   



                    <div class="field button">
                        <input type="submit" value="Confirm Appoinment">
                    </div>


                </form>

            </section>
        </div>
    </div>
    <?php include "footer.php" ?>

    <script src="JavaScript/appoinment.js"></script>
</body>


</html>