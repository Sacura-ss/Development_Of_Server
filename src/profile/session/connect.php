<?php

    $connect = mysqli_connect('db', 'user', 'password', 'appDB');

    if (!$connect) {
        die('Error connect to DataBase');
    }