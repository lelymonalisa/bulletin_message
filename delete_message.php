<?php
session_start();
require_once "database.php";

if (isset($_POST["message_id"])) {
    $message_id = $_POST["message_id"];

    if (isset($_SESSION["userid"])) {
        $user_id = $_SESSION["userid"];
        $stmt = $conn->prepare("SELECT userid FROM message WHERE message_id = ?");
        $stmt->bind_param("i", $message_id);
        $stmt->execute();
        $stmt->bind_result($message_user_id);
        if ($stmt->fetch() && $message_user_id == $user_id) {
            $stmt->close();
            $stmt = $conn->prepare("DELETE FROM message WHERE message_id = ?");
            $stmt->bind_param("i", $message_id);
            $stmt->execute();
            $stmt->close();

            $_SESSION['message_deleted'] = true;
        } else {
            $stmt->close();
        }
    }
}
header("Location: index.php");
?>