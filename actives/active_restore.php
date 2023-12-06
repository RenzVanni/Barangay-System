<div class="restore-container">
  <form class="restoreForm"  action="./model/restore.php" method="post" enctype="multipart/form-data">
    <div class="cons">
      <label for="fileToRestore" id="restoreLabel">Restore</label>
      <input type="file" accept=".sql" name="backup_file" id="fileToRestore" hidden='hidden'>
    </div>
    <input type="submit" value="Restore" id="submitRestore" name="submit">
  </form>
</div>