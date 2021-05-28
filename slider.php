<?php
        include("redimensionarImg.php");
        move_uploaded_file($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto1']['tmp_name'],$_FILES['foto1']['name']);
        move_uploaded_file($_FILES['foto2']['tmp_name'],$_FILES['foto2']['name']);
        $nombre=redimensionarImg($_FILES['foto']['name'], 800, 350);
        $nombre1=redimensionarImg($_FILES['foto1']['name'], 800, 350);
        $nombre2=redimensionarImg($_FILES['foto2']['name'], 800, 350);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StylesheetS.css">
    <title>Slider</title>
</head>
<body>

    <div class="padre">
        <img src="fondo.jpg">
        <div class="container-all">

        <input type="radio" id="1" name="image-slide" hidden/>
        <input type="radio" id="2" name="image-slide" hidden/>
        <input type="radio" id="3" name="image-slide" hidden/>

        <div class="slide">

        <div class="item-slide">
            <img src="<?php echo 'archivos/'.$nombre; ?>">
        </div>

        <div class="item-slide">
        <img src="<?php echo 'archivos/'.$nombre1; ?>">
        </div>

        <div class="item-slide">
        <img src="<?php echo 'archivos/'.$nombre2; ?>">
        </div>

        </div>

        <div class="pagination">

        <label class="pagination-item" for="1">
        <img src="<?php echo 'archivos/'.$_FILES['foto']['name']; ?>">
        </label>

        <label class="pagination-item" for="2">
            <img src="<?php echo 'archivos/'.$_FILES['foto1']['name']; ?>">
        </label>

        <label class="pagination-item" for="3">
            <img src="<?php echo 'archivos/'.$_FILES['foto2']['name']; ?>">
        </label>

    </div>

    </div>





</body>
</html>