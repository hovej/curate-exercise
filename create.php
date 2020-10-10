<?php
include 'admin_header.php';
include 'functions.php';

if (isset($_POST['submit'])) {
  if ($_POST['question'] && $_POST['answer']) {
    createPost();
  } else {
    echo "<p class='text-danger'>Please fill out both question and answer fields.</p>";
  }
}
?>

<div class='col-sm-3'></div>
<div class='col-sm-6'>
  <h2 class='subheading'>Please enter the question and answer you would like to add below.</h2>
  <form action="create.php" method="post">
    <div class='form-group'>
      <label for='question'>Question</label>
      <input type='text' name='question' class='form-control'>
    </div>
    <div class='form-group'>
      <label for='answer'>Answer</label>
      <input type='text' name='answer' class='form-control'>
    </div>
    <input class='btn btn-primary' type='submit' name='submit' value='POST'>
  </form>
  <a href="admin_index.php"><button class='btn btn-danger m-3'>RETURN TO ADMIN</button></a>
</div>