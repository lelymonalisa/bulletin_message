<?php
session_start();
require_once "database.php";

if(isset($_POST["message_id"])) {
    $message_id = $_POST["message_id"];
    $user_id = $_SESSION["userid"];
    $stmt = $conn->prepare("SELECT userid FROM message WHERE id = ?");
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
        echo "<div class='alert alert-success'>Message successfully deleted</div>";
    } else {
        echo "<div class='alert alert-danger'>You do not have permission to delete this message</div>";
    }
} else {
    header("Location: index.php");
}
?>
