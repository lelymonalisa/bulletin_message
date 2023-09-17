 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
 </head>
 <body>
<div class="container">
 <h1>Welcome to the Bulletin Board</h1>
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
 </body>
 </html>