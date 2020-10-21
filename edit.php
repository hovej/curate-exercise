<?php
include "admin_header.php";
include "functions.php";

if (isset($_POST['submit'])) {
  if ($_POST['question'] && $_POST['answer']) {
    updatePost($_GET['id']);
  } else {
    echo "<p class='text-danger'>Please fill out both question and answer fields.</p>";
  }
}
?>

<div class='col-sm-3'></div>
<div class='col-sm-6'>
  <h2>Please enter the new question and answer.</h2>
  <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
    <?php
    showEditInputs($_GET['id']);
    ?>
    <input class='btn btn-primary' type='submit' name='submit' value='SAVE'>
  </form>
  <a href="admin_index.php"><button class='btn btn-danger m-3'>RETURN TO ADMIN</button></a>
</div>
