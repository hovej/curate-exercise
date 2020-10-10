<?php
  include "admin_header.php";
  include "functions.php";

  if (isset($_POST['submit'])) {
    deletePost();
  }
?>

<div class='col-sm-3'></div>
<div class='col-sm-6'>
  <h2>Please select the post ID of the post you would like to delete.</h2>
  <form action="delete.php" method="post">
    <div class='form-group'>
      <select name='id'>
        <?php
          showSinglePost();
        ?>
      </select>
    </div>
    <input class='btn btn-primary' type='submit' name='submit' value='DELETE'>
  </form>
  <a href="admin_index.php"><button class='btn btn-danger m-3'>RETURN TO ADMIN</button></a>
</div>