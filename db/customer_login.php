<?php

session_start();

include("./includes/db.php");
include("./includes/header.php");
// include("functions/functions.php");
// include("includes/main.php");


?>

<center>

    <h1>Login</h1>

    <p class="lead">Already our Customer</p>



</center>
<form action="customer_login.php" method="post">
    <!--form Starts -->

    <div class="form-group">
        <!-- form-group Starts -->

        <label>Email</label>

        <input type="text" class="form-control" name="c_email" required>

    </div><!-- form-group Ends -->

    <div class="form-group">
        <!-- form-group Starts -->

        <label>Password</label>

        <input type="password" class="form-control" name="c_pass" required>

        <h4 align="center">

            <a href="forgot_pass.php"> Forgot Password </a>

        </h4>

    </div><!-- form-group Ends -->

    <div class="text-center">
        <!-- text-center Starts -->

        <button name="login" value="Login" class="btn btn-primary">

            <i class="fa fa-sign-in"></i> Log in


        </button>

    </div><!-- text-center Ends -->


</form>
<!--form Ends -->

<center>
    <!-- center Starts -->

    <a href="customer_register.php">

        <h3>New ? Register Here</h3>

    </a>


</center><!-- center Ends -->


</div>

<!-- php code for data validation -->

<?php


if (isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

    $run_customer = mysqli_query($con, $select_customer);

    $check_customer = mysqli_num_rows($run_customer);

    if ($check_customer == 0) {

        echo "<script>alert('password or email is wrong')</script>";

        exit();
    }

    if ($check_customer == 1) {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('my_account.php','_self')</script>";
    } else {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('customer_register.php','_self')</script>";
    }
}







?>