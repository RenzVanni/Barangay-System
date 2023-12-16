<?php include "./server/server.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./frontendScss/styles.css">

</head>

<body>
    <?php include "./frontendModel/fetch_brgy_information.php"?>
    <div class="login_page">
        <section class="section-1">
            <div class="logo-container">
                <img src="./uploads/logo/<?= $brgy_logo ?>" alt="Barangay Logo">
            </div>
        </section>

        <section class="section-2 frontendLogin">
            <div class="close">
                <a href="./index.php">
                    <img src="./assets/close-login.svg" alt="close">
                </a>
            </div>
            <form action="./model/access_login.php" method="post">
                <h1>LOGIN</h1>
                <span><?= (isset($_SESSION['message'])) ? $_SESSION['message'] : "" ?></span>
                <!-- <div class="username">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="password">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div> -->

                <div class="username">
                    <div class="icon-container">
                        <img src="./assets/register-profile-icon.svg" alt="">
                    </div>
                        <input type="text" name="username" id="" placeholder="Username" required>
                </div>
                <div class="password">
                    <div class="icon-container">
                        <img src="./assets/register-lock-icon.svg" alt="">
                    </div>
                        <input type="password" name="password" id="" placeholder="Password" required>
                </div>

                <button type="submit">Log In</button>
            </form>
            <p>Don't you have an account? <span class="signUp">Sign up</span><span class="forgotPassword">Forgot password?</span></p>
        </section>

        <section class="section-3 frontendRegister">
            <div class="close">
                <a href="./index.php">
                    <img src="./assets/close-login.svg" alt="close">
                </a>
            </div>
            <form action="./frontendModel/registration.php" method="post">
                <h1>Create account</h1>
                <p>Give Us of some your information to get free access</p>
                <span><?= (isset($_SESSION['message'])) ? $_SESSION['message'] : "" ?></span>

                <label for="">Name:</label>
                <div class="register-fname">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="firstname" id="" placeholder="Firstname" required>
                </div>
                <div class="register-mname">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="middlename" id="" placeholder="Middlename">
                </div>
                <div class="register-lname">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="lastname" id="" placeholder="Lastname" required>
                </div>
                <div class="register-suffix">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="suffix" id="" placeholder="suffix" >
                </div>

                <label for="">Birthdate:</label>
                <div class="register-bod">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="date" name="birthdate"s id="" required>
                </div>

                <label for="">Address:</label>
                <div class="register-house_no">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="house_no" id="" placeholder="House no">
                </div>
                <div class="register-street">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="street" id="" placeholder="Street" required>
                </div>
                <div class="register-subdivision">
                    <div class="icon-container">
                        <img src="./assets/register-userId-icon.svg" alt="">
                    </div>
                        <input type="text" name="subdivision" id="" placeholder="Subdivision">
                </div>
                
                <label for="">Username:</label>
                <div class="username">
                    <div class="icon-container">
                        <img src="./assets/register-profile-icon.svg" alt="">
                    </div>
                        <input type="text" name="username" id="" placeholder="Username" required>
                </div>

                <label for="">Email:</label>
                <div class="email">
                    <div class="icon-container">
                        <img src="./assets/register-email-icon.svg" alt="">
                    </div>
                        <input type="email" name="email" id="" placeholder="Email" required>  
                </div>

                <label for="">Password:</label>
                <div class="password">
                    <div class="icon-container">
                        <img src="./assets/register-lock-icon.svg" alt="">
                    </div>
                        <input type="password" name="password" id="" placeholder="Password" required>
                </div>

                <button type="submit">Register</button>
            </form>
            <p>Already an account? <span class="register_login">Log In.</span></p>
        </section>

        <section class="section-4 frontendForgotPassword">
            <div class="close">
                <a href="./index.php">
                    <img src="./assets/close-login.svg" alt="close">
                </a>
            </div>
            <form action="./frontendModel/forgot_password.php" method="post">
                <h1>Forgot Password</h1>
                <span><?= (isset($_SESSION['message'])) ? $_SESSION['message'] : "" ?></span>

                <div class="email">
                    <div class="icon-container">
                        <img src="./assets/register-email-icon.svg" alt="">
                    </div>
                        <input type="email" name="email" id="" placeholder="Email" required>
                </div>

                <button type="submit">Reset Password</button>
            </form>
            <p>Already an account? <span class="register_login">Log In.</span></p>
        </section>

    </div>

    <script src="./forntendJs//jQuery-3-7-0.js"></script>
    <script>
        // ! SIGN UP

    const signUpBtn = document.querySelector(".signUp");
    const registerContainer = document.querySelector(".frontendRegister");
    const frontendLoginContainer = document.querySelector(".frontendLogin");
    const frontendForgotContainer = document.querySelector(".frontendForgotPassword");

    const registerLogin = document.querySelectorAll(".register_login");
    const forgotPasswordBtn = document.querySelector(".forgotPassword");

    signUpBtn.addEventListener("click", () => {
        registerContainer.style.display = "flex";
        frontendLoginContainer.style.display = "none";
    });

    registerLogin.forEach(registerLogin => {
        registerLogin.addEventListener("click", () => {
            registerContainer.style.display = "none";
            frontendForgotContainer.style.display = "none";
            frontendLoginContainer.style.display = "flex";
        });
    })

    forgotPasswordBtn.addEventListener("click", () => {
        frontendForgotContainer.style.display = "flex";
        frontendLoginContainer.style.display = "none";
    })
    </script>
</body>

</html>