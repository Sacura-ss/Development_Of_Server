<?php
    
    // for CORS
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Credentials: true');
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
        if ($type === 'adm') {
            getUsers($mysqli);
        }
    } elseif ($method === 'POST') {
        if ($type === 'seas') {
            addPost($mysqli, $_POST);
        }
    } elseif ($method === 'PATCH') {
        if ($type === 'seas') {
            // существует ли id
            if (isset($id)) {
                // получаем данные с метода patch
                $data = file_get_contents('php://input');
                // запрос пишется raw в шормате json => преобразуем в массив
                $data = json_decode($data, true);
                updateSea($mysqli, $id, $data);
            }
        }
    } elseif ($method === 'DELETE') {
        if ($type === 'seas') {
            // существует ли id
            if (isset($id)) {
                deleteSea($mysqli, $id);
            }
        }
    }

?>