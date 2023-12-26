<?php

    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (isset($_SESSION['admin'])) {

        if (! $_SESSION['admin']) header('Location: index.php');

    }
    else {

        header('Location: index.php');

    }
    
    include('openBD.php');

    $id = $_GET['index'];

    $currentBrand = $brand[$id];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить промокод</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <main class="adminBody active">
        <form action="adminScript/editBrand.php" method="POST">
            <br>
            <span>Заголовок</span>
            <?php echo '<input type="text" name="title" value="'.$currentBrand["title"].'">'; ?>
            <span>Картинка</span>
            <input type="file" name="image">
            <?php echo '<input type="hidden" name="index" value="'.$id.'">'; ?>
            <input type="submit" value="Изменить">
            <br>
        </form>
    </main>
    
</body>
</html>