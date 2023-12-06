<div class="import-container">
  <form class="import"  action="./model/import_households.php" method="post" enctype="multipart/form-data">
    <div class="cons">
      <label for="fileToUpload" id="labelValue">Choose file...</label>
      <input type="file" name="fileToUpload" id="fileToUpload" hidden='hidden'>
    </div>
    <input type="submit" value="Import" id="submitImport" name="submit">
  </form>
</div>