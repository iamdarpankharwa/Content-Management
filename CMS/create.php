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
  <?php require "db.php" ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="create.php">Create</a>
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

<div class="container">
  <div class="py-5 text-center">
    
    <h2>Create Your Blog Here</h2>
    <p class="lead">The Content Management Website allows you to create and post your own blog.</p>
  </div>

  <div class="row">
  <form method = "POST">
  <div class="form-group">
    <h5><label for="exampleInputEmail1">Enter your Email:</label><h5>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <h5><label for="exampleInputEmail1">Heading of the Blog</label><h5>
    <input type="text" name="heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <h5><label for="exampleInputEmail1">Content</label><h5>
    <textarea rows=20 style="width:1000px" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" value="Publish" name="submit" class="btn btn-success my-2 my-sm-0"></input>
  </div>
    </form>
  </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
        }
        if(isset($_POST['heading']))
        {
            $heading = $_POST['heading'];
        }
        if(isset($_POST['content']))
        {
            $content = $_POST['content'];
        }
        if($heading != NULL and $content!= NULL and $email!= NULL)
        {
            $query = "insert into blogs(heading, content, email) values ('".$heading."','"
            .$content."','".$email."');";
            $execute = mysqli_query($conn, $query);
                if($execute)
                {
                    echo "<script>
                            alert('Blog has been posted successfully');
                        </script>";
                }
        }
    }
?>
     
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>