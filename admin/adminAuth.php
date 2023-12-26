<?php

    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login == 'judyS' && $password == 'q412fdasf5') {

        session_start();
        $_SESSION['admin'] = true;
        $script = 'admin.php';

    }
    else {

        $script = 'index.php';

    }
    header("Location: $script");

?>