<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css ?<?php echo time(); ?>">
</head>
<body>
  <div class="container">
    <div class="layer1">
     <img src="image/navbarlogo1.png" alt="">
      Barangay Zone IV Dasmarinas Cavite
    </div>
    <div class="layer2">
      <img src="vector/Vector 1.png" alt="">
      <img class="navbarlogo" src="image/navbarlogo.png" alt="">
    </div>
  </div> 

  

  <div class="login-cont">
    <form action="./model/access_login.php" method="POST">
      <h3>Login</h3> 
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
  
      <input class="login" type="submit" value="Sign In">
    </form>
  </div>

              <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
        <?php echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>"; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif ?>
</body>
</html>