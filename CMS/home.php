<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Content Management</title>
  </head>
  <body>
    <?php require "db.php"?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST">
      
      <input type="submit" name="submit" value="Logout" class="btn btn-danger my-2 my-sm-0 " type="submit"></input>
      <?php
      if(isset($_POST['submit']))
      {
        $url = "index.php";
        header("Location: ".$url);
      }
      ?>
    </form>
  </div>
</nav>

      <?php
      $sql = "select blogs.heading, blogs.content, blogs.email, users.name from blogs join users on
      blogs.email = users.email";
      $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc())
            {
                echo '<div class="jumbotron p-4 p-md-5 mt-5 text-white rounded bg-dark">';
                echo '<div class="col-md-6 px-0">';
                echo '<h1 class="display-4 font-italic">';
                echo $row['heading'];
                echo '</h1>';
                echo '</div></div>' ;
                echo '<div class="col-md-8 blog-main">';
                echo '<h3 class="pb-4 mb-4 font-italic border-bottom">';
                echo 'By '.$row['name'];
                echo '</h3>';
                echo '<div class="blog-post">';
                echo $row['content'];
                echo '</div>';
                echo '</div>';
            }
            }
        ?>
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>