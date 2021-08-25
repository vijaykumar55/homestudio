<?php

session_start();

include("./includes/db.php");
include("./includes/header.php");
// include("functions/functions.php");
// include("includes/main.php");


?>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
    box-sizing: border-box;
}

body {
    background: #f6f5f7;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    margin: -20px 0 50px;
}

h1 {
    font-weight: bold;
    margin: 0;
}

h2 {
    text-align: center;
}

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
}

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

.tick1 {
    font-size: 18px !important;
    color: red;
}

.cross1 {
    font-size: 18px !important;
    color: red;
}

.tick2 {
    font-size: 18px !important;
    color: red;
}

.cross2 {
    font-size: 18px !important;
    color: red;
}

button {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

button:active {
    transform: scale(0.95);
}

button:focus {
    outline: none;
}

button.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
}

form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
}

input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.right-panel-active .sign-in-container {
    transform: translateX(100%);
}

.sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
}

@keyframes show {

    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
}

.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
}

.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}

.overlay {
    background: #FF416C;
    background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
    background: linear-gradient(to right, #FF4B2B, #FF416C);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.overlay-left {
    transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
    transform: translateX(0);
}

.overlay-right {
    right: 0;
    transform: translateX(0);
}

.container.right-panel-active .overlay-right {
    transform: translateX(20%);
}

.social-container {
    margin: 20px 0;
}

.social-container a {
    border: 1px solid #DDDDDD;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
</style>

<!-- Register Panel -->

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="customer_login.php" method="POST" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" name="c_name" required />
            <input type="email" placeholder="Email" name="c_email" required />
            <input type="password" placeholder="Password" id="pass" name="c_pass" required />

            <!-- <input type="password" placeholder="Confirm-Password" id="con_pass" required /> -->
            <input type="text" placeholder="Mobile No" name="c_contact" required />
            <input type="text" placeholder="City" name="c_city" required />
            <input type="text" placeholder="State" name="c_address" required />

            <button type="submit" name="register">Sign Up</button>
        </form>
    </div>

    <!-- Login panel -->
    <div class="form-container sign-in-container">
        <form action="customer_login.php" method="post">
            <h1>Sign in</h1>
            <input type="email" placeholder="Email" name="c_email" required />
            <input type="password" placeholder="Password" name="c_pass" required />
            <a href="forgot_pass.php">Forgot your password?</a>
            <button type="submit" name="login">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<!-- php code for data validation -->

<?php


if (isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

    $run_customer = mysqli_query($con, $select_customer);

    $check_customer = mysqli_num_rows($run_customer);

    // if ($check_customer == 0) {

    //     echo "<script>alert('password or email is wrong')</script>";

    //     exit();
    // }

    if ($check_customer == 1) {

        $_SESSION['customer_email'] = $customer_email;

        echo "<script>alert('You are Logged In')</script>";

        echo "<script>window.open('../index.html','_self')</script>";
    } else {
        echo "<script>alert('password or email is wrong')</script>";

        exit();
    }
}







?>


<?php

if (isset($_POST['register'])) {

    $secret = "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv";


    if ($secret == "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv") {

        $c_name = $_POST['c_name'];

        $c_email = $_POST['c_email'];

        $c_pass = $_POST['c_pass'];

        // $c_country = $_POST['c_country'];
        $c_contact = $_POST['c_contact'];

        $c_city = $_POST['c_city'];



        $c_address = $_POST['c_address'];


        $get_email = "select * from customers where customer_email='$c_email'";

        $run_email = mysqli_query($con, $get_email);

        $check_email = mysqli_num_rows($run_email);

        if ($check_email == 1) {

            echo "<script>alert('This email is already registered, try another one')</script>";

            exit();
        }

        $customer_confirm_code = mt_rand();

        $subject = "Email Confirmation Message";

        $from = "svkvijaykumar123@gmail.com";

        $message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";

        $headers = "From: $from \r\n";

        $headers .= "Content-type: text/html\r\n";

        mail($c_email, $subject, $message, $headers);

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_city,customer_address) values ('$c_name','$c_email','$c_pass','$c_contact','$c_city','$c_address')";


        $run_customer = mysqli_query($con, $insert_customer);

        // $sel_cart = "select * from cart where ip_add='$c_ip'";

        // $run_cart = mysqli_query($con, $sel_cart);

        // $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart > 0) {

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Successfully')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        } else {

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Successfully')</script>";

            echo "<script>window.open('customer_login.php','_self')</script>";
        }
    } else {

        echo "<script>alert('Please Select Captcha, Try Again')</script>";
    }
}

?>


<script type="text/javascript">
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
</script>