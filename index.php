<?php
require_once 'connection.php';
$sql="SELECT*FROM tours ";
$stmt=$conn->prepare($sql);
$stmt->execute();
$tour=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>My Page Title</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <?php if (isset($_GET['message'])) : ?>
        <div>
            <?= $_GET['message'] ?>
        </div>
    <?php endif ?>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"  >id</th>
      <th scope="col">name</th>
      <th scope="col">image</th>
      <th scope="col">intro</th>
      <th scope="col">description</th>
      <th scope="col">number_date</th>
      <th scope="col">price</th>
      <th scope="col">category_id</th>
      <th scope="col">Add</th>
    </tr>
  </thead>
  <tbody>
    <img src="./img/" alt="">
    <?php 
    foreach($tour as $tu){
        extract($tu);
        echo '
        <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>
      <img src="./img/'.$image.'" alt="" width="100">
      </td>
      <td>'.$intro.'</td>
      <td>'.$description.'</td>
      <td>'.$number_date.'</td>
      <td>'.$price.'</td>
      <td>'.$category_id.'</td>
      <td>
      
      <button type="button" class="btn btn-success"><a href="edit.php?id='.$id.'" style="color:aliceblue">Edit</a></button>
      <button type="button" class="btn btn-danger"><a href="delete.php?id='.$id.'" style="color:aliceblue">Delete</a></button>
      </td>
    </tr>
        ';
    }
    ?>
    
   
  </tbody>
</table>

<button type="button" class="btn btn-primary"><a href="add.php" style="color:aliceblue">Add</a></button>

        <!--Optional JavaScript-->
        <!--jQuery first, then Popper.js, then Bootstrap JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>