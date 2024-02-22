<?php
    include('../admin/inc/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <?php include('../admin/inc/nav.php') ?>
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="row">
            <div class="col">
                <?php echo get_message(); ?>
            </div>
        </div>       
        <h1 class="display-5 mt-3 mb-5">
          Student catalog
        </h1>
      </div>
    </div>
    <?php 
      $connect = mysqli_connect('localhost', 'root', 'root', 'HTTP5225');
      if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
      }
      $query = 'SELECT * FROM students';

      $students = mysqli_query($connect, $query);
      // echo '<pre>';
      // echo print_r($students);
      // echo '</pre>';
    ?>
    <div class="row">
      <?php
        foreach($students as $student){

          if($student['marks'] < 50){
            $bgClass = 'bg-danger';
          }else{
            $bgClass = 'bg-success';
          }

          echo '<div class="col-md-4 mt-2 mb-2">
            <div class="card ' . $bgClass . '">
              <img src="' . $student['imageURL'] . '" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">' . $student['fname'] . ' ' . $student['lname'] . '</h5>
                <p class="card-text">Marks: ' . $student['marks'] . '</p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col">
                    <form action="update.php" method="GET">
                      <input type="hidden" name="id" value="' . $student['id'] . '">
                      <button type="submit" class="btn btn-sm btn-info">
                        Update
                      </button>
                    </form>
                  </div>
                  <div class="col">
                    <form action="inc/deleteStudent.php" method="GET">
                      <input type="hidden" name="id" value="' . $student['id'] . '">
                      <button type="submit" name="deleteStudent" class="btn btn-sm btn-warning">
                        Delete
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              </div>
            </div>';  
        }
      ?>
    </div>

  </div>
</body>
</html>