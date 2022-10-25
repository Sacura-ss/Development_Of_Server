<?php
    // добавляем в заголовок, что страница возвращает json
    header('Content-type: application/json');
    // подключаем доп код
    require 'functions.php';
    // из глобальной переменной достаем тип метода put, post, ...
    $method = $_SERVER['REQUEST_METHOD'];

    // подключение к бд
    $mysqli = new mysqli("db", "user", "password", "appDB");
    
    // получаем путь из строки запроса
    $q = $_GET['q'];
    $params = explode('/', $q); // разбиваем строку по /
    $type = $params[0];
    $id = $params[1];

    // определяем функциональность в зависимости от запроса
    if ($method === 'GET') {
        if ($type === 'seas') {
            // существует ли id
            if (isset($id)) {
                getSea($mysqli, $id);
            } else {
                getSeas($mysqli);
            }
        }
    } elseif ($method === 'POST') {
        if ($type === 'seas') {
            addPost($mysqli, $_POST);
        }
    }

?>