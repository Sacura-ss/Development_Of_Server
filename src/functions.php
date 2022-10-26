<?php

function getSeas ($mysqli) {
    $results = $mysqli->query("SELECT * FROM seas");
    $resultsList = [];
    // перебираем список результатов и заносим в массив
    while($result = mysqli_fetch_assoc($results)) {
        $resultsList[] = $result;
    }
    // переводим  json
    echo json_encode($resultsList, $flags = JSON_UNESCAPED_UNICODE);
}

function getSea ($mysqli, $id) {
    $result = $mysqli->query("SELECT * FROM seas WHERE `ID` = '$id'");
   
    if(mysqli_num_rows($result) === 0) {
        // выводим ошибку 404 если не найден элемент
        http_response_code(404);
        // выводим ответ об ошибке
        $answer = [
            "status" => false,
            "message" => "Sea not found"
        ];
        echo json_encode($answer);
    } else {
        // преобразуем в массив
        $result = mysqli_fetch_assoc($result);
        echo json_encode($result);
    }
}

function addPost($mysqli, $data) {

    $title = $data['title'];
    $body = $data['body'];
    mysqli_query($mysqli, "INSERT INTO `seas` (`ID`, `seasname`, `dat`) VALUES (NULL, '$title', '$body')");

    // код 201 - создано
    http_response_code(201);

    // выводим ответ о создании и id созданной сущности
    $answer = [
        "status" => true,
        "sea_id" => mysqli_insert_id($mysqli)
    ];

    echo json_encode($answer);
}

function  updateSea($mysqli, $id, $data) {
    $title = $data['title'];
    $body = $data['body'];

    mysqli_query($mysqli, "UPDATE `seas` SET  `seasname` = '$title', `dat` = '$body' WHERE `ID` = '$id'");

    // код 200 - успешно
    http_response_code(200);

    // выводим ответ о создании и id созданной сущности
    $answer = [
        "status" => true,
        "message" => "Sea is updated"
    ];

    echo json_encode($answer);
}

function deleteSea($mysqli, $id) {
    mysqli_query($mysqli, "DELETE FROM `seas` WHERE `ID` = '$id'");

    // код 200 - успешно
    http_response_code(200);

    // выводим ответ о создании и id созданной сущности
    $answer = [
        "status" => true,
        "message" => "Sea is deleted"
    ];

    echo json_encode($answer);
}

function getUsers($mysqli) {
    $results = $mysqli->query("SELECT * FROM users");
    $resultsList = [];
    // перебираем список результатов и заносим в массив
    while($result = mysqli_fetch_assoc($results)) {
        $resultsList[] = $result;
    }
    // переводим  json
    echo json_encode($resultsList, $flags = JSON_UNESCAPED_UNICODE);
}

?>