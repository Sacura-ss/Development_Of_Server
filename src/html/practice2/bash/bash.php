<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bash</title>
    <style>
        .center {
            position: relative;
            top: 20%;
            text-align: center;
            background: black;
            color: white;
        }

        .title {
            text-shadow: -2px -2px 0 #4D4644, 2px -2px 0 #4D4644, -2px 2px 0 #4D4644, 2px 2px 0 #4D4644, 4px 4px 0 white, 5px 5px 0 white, 6px 6px 0 white;
            letter-spacing: 0.1em;
        }

        .bash {
            margin-top: 10%;
            font-size: 20ems;
            font-family: monospace;
        }
    </style>
</head>

<body class="center">
    <?php
    echo '<h1 class="title">Input your command<h1>';
    echo '<form><input name="cmd" /></form>';
    ?>
    <div class="bash">
        <?php
        if (isset($_GET['cmd']))
            if ($_GET['cmd'] == 'ls' || $_GET['cmd'] == 'ps' || $_GET['cmd'] == 'whoami' || $_GET['cmd'] == 'id') {
                $output = shell_exec($_GET['cmd']);
                echo "<pre>$output</pre>";
            } else {
                echo "Наш сервер такие команды не обрабатывает!!!";
            }
        ?>
    </div>
</body>

</html>