<?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>"
    role="alert">
    <?php echo "<script type='text/javascript'>alert('" . $_SESSION['message'] . "');</script>"; ?>
</div>
<?php unset($_SESSION['message']); ?>
<?php endif ?>