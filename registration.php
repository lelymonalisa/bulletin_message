<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $fullname = $_POST["fullname"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if (empty($username) or empty($fullname) or empty($password) or empty($passwordRepeat)) {
                array_push($errors, "All fields can't be empty");
            }
            if (strpos($username, ' ') !== false) {
                array_push($errors, "Login ID can't contain space");
            }
            if (strlen($fullname) > 10) {
                array_push($errors, "Name max 10 characters");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password min 8 characters");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Passwords don't match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Login ID already exists!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (username,fullname, password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $username, $fullname, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Congratulations! You have successfully registered.</div>";
                } else {
                    die("Something went wrong");
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
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="username" class="form-control" name="username" placeholder="Login ID">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <br>
            <div>
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
        </form>

</html>