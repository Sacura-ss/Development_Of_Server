<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Stat</title>
    <link rel="stylesheet" href="../style/style.css" type="text/css"/>
</head>
<body>
<?php
require_once "faker.php";

generateData();
?>
<?php
require_once "plot_radar.php";
require_once "plot_pie.php";
require_once "plot_graph.php";

$plotpie = drawPlotPie();
$plotgraph = drawPlotGraph();
$plotbar = drawPlotRadar();
?>
<?php
require_once "watermark.php";

$images = array($plotpie, 
                $plotgraph, 
                $plotbar);

foreach ($images as $image) {
    addWatermark($image);
}


?>
<img src="images/plot_pie.png" alt="plot_1.png"><br>
<img src="images/plot_graph.png" alt="plot_2.png"><br>
<img src="images/plot_radar.png" alt="plot_3.png"><br>
<br>
<br>
<br>
<table class="table">
    <tr>
        <th>Location</th>
        <th>Temperature</th>
        <th>Pressure</th>
        <th>Wind speed</th>
        <th>Date</th>
        <th>Weather</th>
    </tr>
    <?php
    $data = getRawData();

    foreach ($data as $data_row) {
        echo "<tr>";
        echo "<td>".$data_row->name."</td>";
        echo "<td>".$data_row->temperature."</td>";
        echo "<td>".$data_row->color."</td>";
        echo "<td>".$data_row->date."</td>";
        echo "<td>".$data_row->pollution."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>