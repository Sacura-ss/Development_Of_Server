<html lang="en">

<head>
    <title>Дом</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <style>
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button2 {
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
        }
        .button2:hover {
            background-color: #008CBA;
            color: white;
        }
        h1{
            color: #008CBA;
        }
        h2 {
            color: #008CBA; 
            position: absolute;
            top: 40%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        #center {
            margin: 0;
            position: absolute;
            top: 20%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

        }
        #center2 {
            margin: 0;
            position: absolute;
            top: 80%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

        }
</style>
</head>

<body>
    <h1>Добро пожаловать на наш сайт</h1>
    <form id="center" action="admin/index.php" target="_blank">
        <button class="button button2">Страница администратора</button>
    </form>
    <h2>Закажите билеты на море</h2>
    <p id="center2"><img src="images/dzen.jpg" alt="Письма мастера дзен"></p>
</body>

</html>