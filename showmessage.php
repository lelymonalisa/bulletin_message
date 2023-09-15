<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div>
<?php
    
    require_once "database.php";
    $sql="SELECT * FROM message ORDER BY postdate DESC";
    $all_message = $conn->query($sql);
    $row = mysqli_fetch_assoc($all_message);
  
?>
<div> 
<?php
 while ($row = mysqli_fetch_assoc($all_message)) {
?>
<div class="container">
    <div class="form-group">
        <p class="username"><?php echo $row["username"];?></p>
    </div>
    <div class="form-group">
        <p class="postdate"><?php echo $row["postdate"];?></p>
    </div>
    <div class="form-group">
        <p class="<?php echo $row["messagecolor"];?>" style='color:<?php echo $row["messagecolor"];?>'><?php echo $row["message"];?></p>
    </div>
    <img class="image" src="<?php echo 'bulletin-message/uploaded_img/'.$row["image"]; ?>" height="100" alt="uploaded image " />
    </div> <br>
    <?php
 }
    ?>
</div>
</body>
</html>
