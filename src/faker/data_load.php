<?php

function getRawData() {
    $input = file_get_contents('data.json');
    return json_decode($input);
}

function getLabelsAndValues($func) {
    $rawData = getRawData();
    $dayCount = $func($rawData);
    $labels = array_keys($dayCount);
    $values = array_values($dayCount);
    return array("labels" => $labels, "values" => $values);
}
// for pie
function getDateCount($data) {
    $dateCount = array();
    foreach($data as $row) {
        $date = $row->date;
        if (!isset($dateCount[$date])) {
            $dateCount[$date] = 0;
        }
        $dateCount[$date] += 1;
    }
    return $dateCount;
}

// for graph
function getAverageTemperatureAutoload() {
    return getAverageTemperature(getRawData());
}
// for graph
function getAverageTemperature($data) {
    $average = array();
    foreach($data as $row) {
        $date = $row->date;
        $temperature = $row->temperature;
        if(!isset($average[$date])) {
            $average[$date] = array(0, 0);
        }
        $average[$date][0] += $temperature;
        $average[$date][1] += 1;
    }

    foreach ($average as $key => $value) {
        $average[$key] = $average[$key][0] / $average[$key][1];
    }
    return $average;
}

// for radar
function getAveragePollutionAutoload() {
    return getAverageTemperature(getRawData());
}
// for radar
function getAveragePollution($data) {
    $average = array();
    foreach($data as $row) {
        $date = $row->date;
        $pollution = $row->pollution;
        if(!isset($average[$date])) {
            $average[$date] = array(0, 0);
        }
        $average[$date][0] += $pollution;
        $average[$date][1] += 1;
    }

    foreach ($average as $key => $value) {
        $average[$key] = $average[$key][0] / $average[$key][1];
    }
    return $average;
}
?>