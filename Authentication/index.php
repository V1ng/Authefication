<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="blockAut">
    <form action="connect.php" method="post">
    <h2 align="center">Авторизация</h2>
        <table class="tableForm">
            <tr>
                <p>Логин</p></tr><tr><input type="text" placeholder="Введите логин" name="login"></tr>
            <tr>
                <p>Пароль</p></tr><tr><input type="password" placeholder="Введите пароль" name="password"></tr>
            <tr><td><input type="submit" value="Подтвердить" class="button"></td></tr>
        </table>
    </form>
      <p>Нет аккаунта? <a href="registration.php">Зарегистрироваться</a></p>
      <?
      if($_SESSION['msg']){
          echo '<p class="error">'.$_SESSION['msg'].'</p>';
      }
      unset($_SESSION['msg']);
      ?>
  </div>
</body>
</html>