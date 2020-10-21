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
        <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning">EDIT</button></a>
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
  $likes = 0;

  $query = "INSERT INTO posts (question, answer, likes)";
  $query .= "VALUES ('$question', '$answer', $likes)";
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

function showEditInputs($id)
{
  global $connection;
  $query = "SELECT * FROM posts";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Query failed.");
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['id'] == $id) {
        $question = $row['question'];
        $answer = $row['answer']; ?>
        <div class='form-group'>
          <label for='question'>Question</label>
          <?php echo "<input type='text' name='question' class='form-control' value='$question'>"; ?>
        </div>
        <div class='form-group'>
          <label for='answer'>Answer</label>
          <?php echo "<input type='text' name='answer' class='form-control' value='$answer'>"; ?>
        </div>
<?php
      }
    }
  }
}

function updatePost($id)
{
  global $connection;
  $question = $_POST['question'];
  $answer = $_POST['answer'];

  $query = "UPDATE posts SET ";
  $query .= "question = '$question', ";
  $query .= "answer = '$answer' ";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($connection, $query);
  if ($result) {
    echo "<p>Update was successful</p>";
  } else {
    echo "Update has failed.";
  }
}

function deletePost()
{
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
