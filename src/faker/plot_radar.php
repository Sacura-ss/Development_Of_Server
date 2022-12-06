
<?php
require_once '../../vendor/autoload.php';

# используем библиотеку JpGraph для рисования
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

require_once 'data_load.php';

function drawPlotRadar() {
    $__width = 400;
    $__height = 300;
    $graph = new Graph\RadarGraph($__width, $__height, 'auto');
    $graph->SetScale('lin');
    $graph->SetColor('aliceblue');
    // Add a title to the graph
    $graph->title->Set(' Pollution result');

    $data = getAveragePollutionAutoload();
    $labelsAndValues = getLabelsAndValues('getAveragePollution');
    $labels = $labelsAndValues["labels"];
    $values = $labelsAndValues["values"];

    
    $graph->xaxis->SetTickLabels(array_keys($labels));

    $radarplot = new Plot\BarPlot($values);

    $graph->Add($radarplot);

    $graph->Stroke('images/plot_radar.png');

    return 'images/plot_radar.png';

}