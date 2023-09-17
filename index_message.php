<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php
        if (isset($_POST["submit"])) {
            
           $username = $_POST["username"]?? null;
           $message = $_POST["message"];
           $messagecolor = $_POST["messagecolor"];
           $image = $_FILES['image']['name'];
           $errors = array();
           $target = "images/".basename($_FILES['image']['name']);

           if(isset($_SESSION['logged_in']) && $S_SESSION['logged_in']){
            $username = $_SESSION['username'];
           }

           //$file_temp = $_FILES['image']['tmp_name'];
           move_uploaded_file($_FILES['image']['tmp_name'], $target);

           if (empty($username) OR empty($message) OR empty($messagecolor)) {
            array_push($errors,"Fullname & Message fields cannot be empty");
           }
           if (strpos($username, ' ') !== false) {
            array_push($errors, "Username cannot contain space");
            }
           if (strlen($message)>100) {
            array_push($errors,"Message cannot be 100 charactes");
           }
           /*if ($imageFileType != "jpg" && $imageFileType != "png"){
            array_push($errors,"Sorry, only JPG & PNG files are allowed.");
           }*/
           require_once "database.php";
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
               }else{
                
                $sql = "INSERT INTO message (username, message, messagecolor, image) VALUES ( ?, ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"ssss",$username, $message, $messagecolor, $image);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Message succesfully submited</div>";
                }else{
                    die("Something went wrong");
                }
           }
        }
        ?>

        <form action="index_message.php" method="post" enctype="multipart/form-data">    
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <textarea cols="20" rows="5" class="form-control" name="message" placeholder="Enter Full Message"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="messagecolor" placeholder="Choose Color">
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Yellow">Yellow</option></select>
                <div id="textToChange">This is the text to change color</div>
            </div>
            <div class="form-group">
                <input type="file" accept="image/png, image/jpeg" class="form-control" name="image" placeholder="Image">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>
        </form>
    </div><br>
<div>

<?php
    include("showmessage.php");
?>
</body>
</html>
