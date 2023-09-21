<?php
session_start();
if (isset($_SESSION["userid"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            require_once "database.php";

            $sql = "SELECT * FROM users WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["fullname"] = $user["fullname"];
                    $_SESSION["userid"] = $user["id"];
                    header("Location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password doesn't match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Login ID doesn't match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="username" placeholder="Enter Login ID" name="username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <br>
        <div>
            <p>Don't have an account? <a href="registration.php">Register Here</a></p>
        </div>
    </div>
</body>
<div class="container-style">
    <a href="index.php">Home Page</a></p>
</div>

</html>