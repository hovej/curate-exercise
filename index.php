<?php include "db.php";
include "functions.php";
include "header.php"; ?>

<div class='col-md-8'>
  <?php
  showPosts();
  ?>
</div>

<!-- Side section -->
<div class='col-md-4 pt-5'>
  <h5>Want to manage the FAQ? Go to the <a href="./admin_index.php">admin page</a>!</h5>
</div>

<?php include "./footer.php"; ?>