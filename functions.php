<?php
include "db.php";

function showPosts()
{
  global $connection;
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('query failed');
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <div class='border border-primary m-3 p-2'>
        <h4><?php echo $row['question'] ?></h4>
        <p><?php echo $row['answer'] ?></p>
      </div>
    <?php
    }
  }
}

function adminShowPosts()
{
  global $connection;
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('query failed');
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class='border border-primary m-3 p-2'>
        <h4><?php echo $row['question'] ?></h4>
        <p><?php echo $row['answer'] ?></p>
        <p>
          <?php echo "Post ID: ";
          echo $row['id'] ?>
        </p>
      </div>
    <?php
    }
  }
}

function createPost()
{
  global $connection;

  $question = $_POST['question'];
  $answer = $_POST['answer'];

  $query = "INSERT INTO posts (question, answer)";
  $query .= "VALUES ('$question', '$answer')";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query failed.');
  }
}

function showSinglePost()
{
  global $connection;
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Query failed.");
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id']; ?>
      <div class='border border-primary m-3 p-2'>
        <h4><?php echo $row['question'] ?></h4>
        <p><?php echo $row['answer'] ?></p>
      </div>
<?php
      echo "<option value='$id'>$id</option>";
    }
  }
}

function updatePost()
{
  global $connection;
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $id = $_POST['id'];

  $query = "UPDATE posts SET ";
  $query .= "question = '$question', ";
  $query .= "answer = '$answer' ";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($connection, $query);

  if ($result) {
    echo "Update was successful.";
  } else {
    echo "Update has failed.";
  }
}

function deletePost() {
  global $connection;

  $id = $_POST['id'];
  $query = "DELETE FROM posts WHERE id=$id";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die('Query failed.');
  } else {
    echo "Successfully deleted post $id";
  }
}
