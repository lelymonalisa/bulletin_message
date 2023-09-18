<?php
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $fullname = $_SESSION["fullname"];
    $fullnameRequired = false;
} else {
    $userid = "-1";
    $fullnameRequired = true;
}

$messageDeleted = false;
if (isset($_SESSION['message_deleted'])) {
    $messageDeleted = true;
    unset($_SESSION['message_deleted']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Bulletin Board</title>
</head>

<body>
    <div class="container">
        <?php
        if ($messageDeleted) {
            echo "<div id='deleteAlert' class='alert alert-success'>Message successfully deleted</div>";
        }
        ?>

        <?php
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $userid = "-1";
            if (isset($_SESSION["fullname"])) {
                $fullname = $_SESSION["fullname"];
            }
            if (isset($_SESSION["userid"])) {
                $userid = $_SESSION["userid"];
            }
            $message = $_POST["message"];
            $messagecolor = $_POST["messagecolor"];
            $image = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = 'uploaded_img/';
            $destination_path = $image_folder;
            $target_path = $destination_path . basename($_FILES["image"]["name"]);
            move_uploaded_file($image_tmp_name, $target_path);
            $errors = array();
            if ($image_size > 2000000) {
                array_push($errors, "File too big");
            }
            if (empty($message)) {
                array_push($errors, "Message field cannot be empty");
            }
            if ($nameRequired && empty($fullname)) {
                array_push($errors, "Fullname field cannot be empty");
            }
            if (strlen($message) > 100) {
                array_push($errors, "Message cannot be 100 characters");
            }
            require_once "database.php";
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO message (fullname, userid, message, messagecolor, image) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sisss", $fullname, $userid, $message, $messagecolor, $image);
                    mysqli_stmt_execute($stmt);
                    echo "<div id='successAlert' class='alert alert-success'>Message successfully submitted</div>";
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

            }

        }
        ?>
        <script>
            setTimeout(function () {
                var successAlert = document.getElementById('successAlert');
                successAlert.style.display = 'none';
            }, 2000); 
        </script>
        <script>
            setTimeout(function () {
                var deleteAlert = document.getElementById('deleteAlert');
                if (deleteAlert)
                    deleteAlert.style.display = 'none';
            }, 2000); 
        </script>



        <div class="centered-text">
            <h1>Welcome to the Bulletin Board System</h1>
        </div>
        <?PHP if (isset($_SESSION["userid"])): ?>
            <div class="form-group"><br>
                <a href="logout.php" class="btn btn-warning">Logout</a>
            </div>
        <?PHP else: ?>
            <div class="form-group"><br>
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
        <?PHP endif; ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?PHP if (!isset($_SESSION["userid"])): ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname">
                </div>
            <?PHP endif; ?>
            <div class="form-group">
                <textarea cols="20" rows="5" class="form-control" name="message"
                    placeholder="Enter Full Message"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="messagecolor" placeholder="Choose Color" ;>
                    <option value="Black">Black</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                    <option value="Yellow">Yellow</option>
                </select>
                <div style="color:grey">This is the option to change color</div>
            </div>
            <div class="form-group">
                <div>Image(optional)</div>
                <input type="file" accept="image/png, image/jpeg" class="form-control" name="image" placeholder="Image">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>
        </form>
    </div><br>
    <div>

        <?php
        include("show_message.php");
        ?>
    </div>
</body>

</html>