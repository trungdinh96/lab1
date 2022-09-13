<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST['id'];
    $name = $_POST['name'];
    $intro = $_POST['intro'];
    $des = $_POST['des'];
    $number_date = $_POST['number_date'];
    $price = $_POST['price'];
    
    $category_id = $_POST['category_id'];
    $anh = $_POST['image'];
    if ($_FILES['image']['size'] > 0) {
        $anh = $_FILES['image']['name'];
        //upload ảnh
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $anh);
    }

    //Câu lệnh SQL INSERT
    $sql = "INSERT INTO tours(name, image, intro, description, number_date, price, category_id) VALUES('$name', '$anh', '$intro', '$des', '$number_date', '$price', '$category_id')";
    $sql = "UPDATE tours SET name='$name', image='$anh', intro='$intro', description='$des', number_date='$number_date', price='$price', category_id='$category_id' WHERE id=$id";

    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: index.php?message=Sửa dữ liệu thành công");
    exit;
}

//SQL lấy dữ liệu bảng danhmuc
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = $_GET['id'];
$sql = "SELECT * FROM tours WHERE id=$id";
$stmt = $conn->prepare($sql);
$stmt->execute();
//Lấy 1 dòng dữ liệu
$tour = $stmt->fetch(PDO::FETCH_ASSOC);
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
<h1>Thêm dữ liệu</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $tour['id'] ?>">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name" value="<?= $tour['name'] ?>">
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image" id="exampleFormControlInput1"  >
           
        </div>
        <img src="img/<?= $tour['image'] ?>"width="120" alt="">
            <input type="hidden" name="image" value="<?= $tour['image'] ?>">
        <div class="form-group">
            <label for="">Intro</label>
            <input type="text" class="form-control" name="intro" id="exampleFormControlInput1" placeholder="Intro" value="<?= $tour['intro'] ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="des"><?= $tour['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Number_date</label>
            <input type="number" class="form-control" name="number_date" id="exampleFormControlInput1" placeholder="Number_date" value="<?= $tour['number_date'] ?>">
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="Price" value="<?= $tour['price'] ?>">
            </div>  
            <div class="form-group">
            <label for="">Category</label>
            <select class="custom-select" name="category_id">
            <?php foreach ($category as $cate) : ?>
                <?php if ($cate['id'] == $tour['category_id']) : ?>
                    <option selected value="<?= $cate['id'] ?>">
                        <?= $cate['name'] ?>
                    </option>
                <?php else : ?>
                <option value="<?= $cate['id'] ?>">
                    <?= $cate['name'] ?>
                </option>
                <?php endif ?>
            <?php endforeach ?>
</select> 
</div> 
        
            <button type="submit" class="btn btn-primary" name="btn">Add</button>
    </form>

    <!--Optional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>