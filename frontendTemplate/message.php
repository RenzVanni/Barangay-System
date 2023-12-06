<?php 
if(isset($_SESSION['message'])) 
{ ?>
<div class="active-success">
    <div class="container">
        <div class="close-icon-message"><img src="./assets/close-login.svg" alt=""></div>
        <h2><?php echo $_SESSION['message']; ?></h2>
        <!-- <p>Thank you for your request. We are working on it! To check your request status, please go to <a
                href="Cart.php">"Request Status"</a> page.
        </p> -->
        <?php if(isset($_SESSION['sub_message'])) {
            echo $_SESSION['sub_message'];
      unset($_SESSION['sub_message']); } ?>


    </div>
</div>
<?php unset($_SESSION['message']);
} ?>