<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель - Логин</title>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>

    <form class="adminLogin" action="adminAuth.php" method='POST'>

        <span>Логин</span>
        <input name='login' type="text">
        <span>Пароль</span>
        <input name='password' type="password">
        <input type="submit" value="Войти">

    </form>
    
</body>
</html>