<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="profile">
    <form>
            <img src="<?=$_SESSION['user']['imgProfile']?>" width="200px">
            <h2><?=$_SESSION['user']['name_user']?></h2>
            <p><?=$_SESSION['user']['birthdate']?></p><??>
            <a href="logout.php" class="Esc">Выйти</a>
    </form>
</div>

</body>
</html>