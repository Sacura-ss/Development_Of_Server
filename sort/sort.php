<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sort</title>
</head>

<body>
    <?php
    function selectSort(array $arr)
    {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }

        for ($i = 0; $i < $count; $i++) {
            $k = $i;

            for ($j = $i + 1; $j < $count; $j++) {
                if ($arr[$k] > $arr[$j]) {
                    $k = $j;
                }

                if ($k != $i) {
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$k];
                    $arr[$k] = $tmp;
                }
            }
        }

        return $arr;
    }

    $arr = $_GET["arr"];
    print_r(selectSort(explode(",", $arr)));
    ?>
</body>

</html>