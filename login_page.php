<?php include "./frontendServer/server.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./frontendScss/styles.css?<?php echo time()?>">

</head>

<body>
    <?php include "./frontendModel/fetch_brgy_information.php"?>
    <div class="login_page">
        <section class="section-1">
            <div class="logo-container">
                <img src="./uploads/logo/<?= $brgy_logo ?>" alt="Barangay Logo">
            </div>
        </section>

        <section class="section-2">
            <div class="close">
                <a href="./main.php">
                    <img src="./assets/close-login.svg" alt="close">
                </a>
            </div>
            <form action="./model/access_login.php" method="post">
                <h1>LOGIN</h1>
                <div class="username">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="password">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit">Sign in</button>
            </form>
        </section>
    </div>

</body>

</html>