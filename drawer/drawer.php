<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drawer</title>
    <style>
        .center {
            height: 100%;
            position: absolute;
            left: 50%;
            top: 20%;
            -webkit-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            transform: translateX(-20%);
        }
    </style>
</head>

<body>

    <?php
    function checkIfNum($param)
    {
        return isset($param) && is_numeric($param);
    }
    function drawRect($color, $height, $width)
    {
        echo '<svg  class = "center">
        <rect width="' . ($width + 100)
            . '" height="' . ($height + 100)
            . '" fill="rgb(' . (($color & 448) >> 6 + 200) . ',' . (($color & 56) >> 3 + 150) . ',' . ($color & 7 + 100)
            . ')" stroke-width="1" stroke="rgb(0,0,0)" />
        </svg>';
    }
    function drawCicle($color, $height, $width)
    {
        echo '<svg  class = "center">
        <circle cx="50%" cy="50%"'
            . '" r="' . sqrt(pow($height + 50, 2) + pow($width + 50, 2))
            . '" fill="rgb(' . (($color & 448) >> 6 + 100) . ',' . (($color & 56) >> 3 + 150) . ',' . ($color & 7 + 200)
            . ')" stroke-width="1" stroke="rgb(0,0,0)" />
        </svg>';
    }
    ?>

    <?php
    $param = $_GET["param"];

    $form = $param & 1; // 1 бит
    $color = $param & 511; // 9 битов
    $height = $param & 7; // 3 бита
    $width = $param & 15; // 4 бита


    if (checkIfNum($param)) {
        if ($form == 1) {
            drawRect($color, $height, $width);
        } else {
            drawCicle($color, $height, $width);
        }
    }

    ?>

</body>

</html>