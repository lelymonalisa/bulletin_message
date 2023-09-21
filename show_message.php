<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div>
        <?php

        require_once "database.php";
        $sql = "SELECT * FROM message ORDER BY postdate DESC";
        $all_message = $conn->query($sql);
        ?>

        <div>
            <?php
            while ($row = mysqli_fetch_assoc($all_message)) {
                ?>
                <div class="container">
                    <form action="delete_message.php" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <p class="fullname">
                                <?php echo htmlspecialchars($row["fullname"]); ?>
                            </p>
                            <p class="postdate">
                                <?php echo $row["postdate"]; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <p class="<?php echo htmlspecialchars($row["messagecolor"]); ?>">
                                <?php echo $row["message"]; ?>
                            </p>
                        </div>
                        <?php
                        if ($row["image"] != "") {
                            echo '<img class="image" src="uploaded_img/' . $row["image"] . '" height="100" alt="uploaded image">';
                        }
                        ?>
                        <?PHP if (isset($_SESSION["userid"]) && $_SESSION["userid"] == $row["userid"]): ?>
                            <form action="delete_message.php" method="post">
                                <input type="hidden" name="message_id" value="<?php echo $row["message_id"]; ?>">
                                <div class="form-btn">
                                    <input type="submit" class="btn btn-danger" value="Delete" name="submit">
                                </div>
                            </form>
                        <?PHP endif; ?>
                </div> <br>
                <?php
            }
            ?>
        </div>
</body>

</html>