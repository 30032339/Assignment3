<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body class="container">
      
      <?php include 'db.php'; ?>
      <BR>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php foreach($record as $menu): ?>
                  
                <li class="nav-item ">
                  <a href="index.php?page='<?php echo $menu['pg']; ?>'" class="nav-link"><?php echo $menu['pg']; ?></a>
                 </li>
                  
    <?php endforeach; ?>
                   
      <li class="nav-item">
        <a class="nav-link" href="create.php" >Create new record</a>
      </li>
    </ul>
  </div>
</nav>
      
      <div class="row">
          <div class="col">
              <?php 
                    
                    if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        
                        // run sql query based on our $pg value
                        $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
                        
                        $single = $record->fetch_assoc();
                        
                        // create variables to hold all our field names from table
                        $pg = $single['pg'];
                        $h1 = $single['h1'];
                        $h2 = $single['h2'];
                        
                        $p1 = $single['p1'];
                        $p2 = $single['p2'];
                        $p3 = $single['p3'];
                        
                        
                        $id = $single['id'];
                        $update = "update.php?update=" . $id;
                        $delete = "db.php?delete=" .$id;
                        
                        echo "
                        
                        <div class='row'>
  <div class='col-sm-12'>
    <div class='card' style='background-color: #e3f2fd;'>
          <div class='card-header text-center'>{$pg}</div>
      <div class='card-body'>
        <h2 class='card-title'>{$h1}</h2>
        <p class='card-text'>{$p1}</p>
                <p class='card-text'>{$p2}</p>
                        <p class='card-text'>{$p3}</p>
        <a href='{$update}' class='btn btn-primary'>Update</a>
                <a href='{$delete}' class='btn btn-danger'>Delete</a>
      </div>
    </div>
  </div>
  
                        ";
                        
                    }
                    else
                    {
                        // default view of index.php
                        
                        echo "
                        
                            <nav class='navbar navbar-light bg-dark'>
                            <a class='navbar-brand' href='#'>
                            <img src='Images/Logo.png' width='400' height='120' alt='' loading='lazy'>
                            </a>
                        </nav>
                                                   <h2 class='text-center'>WELCOME TO SCP FOUNDATION</h2>
                                                   
                                <nav class='navbar'>
                            <a class='navbar-brand rounded mx-auto d-block' href='#'>
                            <img src='Images/Welcome-Logo-Design.png' width='400' height='120' alt='' loading='lazy'>
                            </a>
                        </nav>
                                                   
                        
                        ";
                    }
              
              ?>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>