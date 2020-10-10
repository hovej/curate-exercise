<?php 
include "db.php";
include "admin_header.php";
include "functions.php";
?>

      <div class='col-md-8'>
        <a href="create.php"><button class='btn btn-primary'>CREATE</button></a>
        <a href="edit.php"><button class='btn btn-warning'>EDIT</button></a>
        <a href="delete.php"><button class="btn btn-danger">DELETE</button></a>
        <?php
          adminShowPosts();
        ?>
      </div>

      <!-- Side section -->
      <div class='col-md-4 pt-5'>
        <h5>To view the FAQ as an end-user would see it, go to the <a href="./index.php">home page</a>!</h5>
      </div>
    <?php include "./footer.php" ?>