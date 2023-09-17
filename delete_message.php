<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
require_once "database.php";

if(isset($_POST["message_id"])) {
    $message_id = $_POST["message_id"];
    $user_id = $_SESSION["userid"];
    $stmt = $conn->prepare("DELETE FROM message WHERE message_id = ?");
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $stmt->bind_result($message_user_id);
    $stmt->fetch();
    $stmt->close();

    if($message_user_id == $user_id) {
        $stmt = $conn->prepare("DELETE FROM message WHERE id = ?");
        $stmt->bind_param("i", $message_id);
        $stmt->execute();
        $stmt->close();
    }
} else {
    header("Location: index.php");
}
?>
</body>
</html>


