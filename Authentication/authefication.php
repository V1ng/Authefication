<?php
session_start();

    $name=isset($_POST['name'])?$_POST['name']:'';
    $login=isset($_POST['login'])?$_POST['login']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $confirmedPassword=isset($_POST['confirmedPassword'])?$_POST['confirmedPassword']:'';
    $birthdate=isset($_POST['birthdate'])?$_POST['birthdate']:'';

    if($password == $confirmedPassword){
        $path = 'img/' .time().$_FILES['imgProfile']['name'];
        if(!move_uploaded_file($_FILES['imgProfile']['tmp_name'], $path)){
            $_SESSION['msg']="Ошибка при загрузке изображения";
            header("Location: registration.php");
        }

        if(mb_strlen($name)<2||mb_strlen($name)>30){
            echo "Недопустимая длина имени";
            exit;
        } elseif(mb_strlen($login)<4||mb_strlen($login)>30){
            echo "Недопустимая длина логина";
            exit;
        } elseif(mb_strlen($password)<6||mb_strlen($name)>20){
            echo "Недопустимая длина пароля";
            exit;
        }

        $mysql=new mysqli('localhost','root','','demo');
        $queryStr="INSERT INTO users(name,login,password,birthdate,imgProfile) 
    VALUES ('$name','$login','$password','$birthdate','$path')";
        $checkSuccessful=$mysql->query($queryStr);

        if($checkSuccessful){
            $_SESSION['user']=[
                "login_user"=>$login,
                "name_user"=>$name,
                "birthdate"=>$birthdate,
                "imgProfile"=>$path
            ];
            $_SESSION['msg']="Регистрация прошла успешно";
            header("Location: index.php");
            $mysql->close;
        } else {
            echo "Ошибка. Создание пользователя неудачно: ($mysql->errno) $mysql->error";
        }
    } else {
        $_SESSION['msg']="Пароли не совпадают";
        header("Location: registration.php");
    }

