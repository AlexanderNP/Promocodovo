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

    $currentCategory = $category[$id];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить категорию</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <main class="adminBody active">
        <form action="adminScript/editCategory.php" method="POST">
            <br>
            <span>Название</span>
            <?php echo '<input type="text" name="title" value="'.$currentCategory["title"].'">'; ?>
            <span>SVG-иконка</span>
            <?php echo '<input type="text" name="svg" value="'.$currentCategory["svg_code"].'">'; ?>
            <?php echo '<input type="hidden" name="index" value="'.$id.'">'; ?>
            <input type="submit" value="Изменить">
            <br>
        </form>
    </main>
    
</body>
</html>