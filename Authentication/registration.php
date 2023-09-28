<?php session_start();
if($_SESSION['user']){
    header("Location: profile.php");
}?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="blockAut">
    <form action="authefication.php" method="post" enctype="multipart/form-data">
    <h2 align="center">Регистрация</h2>
        <table class="tableForm">
            <tr>
                <p>Имя</p></tr><tr><input type="text" placeholder="Введите имя" name="name"></tr>
            <tr>
                <p>Логин</p></tr><tr><input type="text" placeholder="Введите логин"name="login"></tr>
            <tr>
                <p>Пароль</p></tr><tr><input type="password" placeholder="Введите пароль" name="password"></tr>
            <tr>
                <p>Подтверждение пароля</p></tr><tr><input type="password" name="confirmedPassword"></tr>
            <tr>
                <p>Дата рождения</p></tr><tr><input type="date" name="birthdate"></tr>
            <tr>
                <p>Фото</p></tr><tr><input type="file" name="imgProfile"></tr>
            <tr><td colspan="2"><input type="submit" value="Подтвердить" class="button"></td></tr>
        </table>
            <?
            if($_SESSION['msg']){
               echo '<p class="error">'.$_SESSION['msg'].'</p>';
            }
            unset($_SESSION['msg']);
            ?>

    </form>
  </div>
</body>
</html>