<?php
session_start();

    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $mysql = new mysqli('localhost', 'root', '', 'demo');
    $queryStr = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $checkSuccessful = $mysql->query($queryStr);

    $row_data = $checkSuccessful->fetch_assoc();
    if ($checkSuccessful->num_rows > 0) {
        $_SESSION['user']=[
            "login_user"=>$login,
            "name_user"=>($row_data['name']),
            "birthdate"=>($row_data['birthdate']),
            "imgProfile"=>($row_data['imgProfile'])
        ];
        header("Location: profile.php");
    } else {
        echo "Ошибка. Неверный логин или пароль: ($mysql->errno) $mysql->error";
    }
    $mysql->close;
