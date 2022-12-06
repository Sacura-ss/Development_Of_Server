<?php
require_once '../../vendor/autoload.php';

# используем библиотеку JpGraph для рисования графика
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

require_once 'data_load.php';

function drawPlotPie() {
    // Create the Pie Graph.
    $graph = new Graph\PieGraph(400, 300);
    $graph->SetColor('aliceblue');
    $graph->title->Set("Date Amount Metrics");
    // set rectangle around
    $graph->SetBox(true);

    $labelsAndValues = getLabelsAndValues('getDateCount');
    $labels = $labelsAndValues["labels"]; // даты
    $values = $labelsAndValues["values"]; // кол-во опред дат

    // create plot (участок) of graph
    $pieplot = new Plot\PiePlot($values);
    $pieplot->ShowBorder();
    $pieplot->SetLabels($labels); // установили метки

    // set plot to graph
    $graph->Add($pieplot);

    // Display the graph 
    $graph->Stroke("images/plot_pie.png");

    return 'images/plot_pie.png';
}