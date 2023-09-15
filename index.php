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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board</title>
</head>
<body>
    <div class="container">
    <?php
        if (isset($_POST["submit"])) {
           $username = $_POST["username"];
           $message = $_POST["message"];
           $messagecolor = $_POST["messagecolor"];
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'bulletin-message/uploaded_img/'.$image;
            $destination_path = getcwd().DIRECTORY_SEPARATOR;
            $target_path = $destination_path.basename($_FILES["image"]["name"]);
            move_uploaded_file($image_tmp_name,$target_path);
            $errors = array();
           if($image_size > 2000000){
            array_push($errors,"File too big");
           }
           
           if (empty($username) OR empty($message) OR empty($messagecolor)) {
            array_push($errors,"Fullname & Message fields cannot be empty");
           }
           if (strpos($username, ' ') !== false) {
            array_push($errors, "Username cannot contain space");
            }
           if (strlen($message)>100) {
            array_push($errors,"Message cannot be 100 charactes");
           }
           require_once "database.php";
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
               }else{
                $sql = "INSERT INTO message (username, message, messagecolor, image) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $message, $messagecolor, $image);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Message successfully submitted</div>";
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                
           }
            
        }
        ?>
        <h1>Welcome to the Bulletin Board</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <form action="index.php" method="post" enctype="multipart/form-data">    
            <div class="form-group"><br>
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
    </div>
</body>
</html>