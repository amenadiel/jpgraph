<?php

// content="text/plain; charset=utf-8"
require_once 'jpgraph/jpgraph.php';
require_once 'jpgraph/jpgraph_line.php';

$datay = [11, 30, 20, 13, 10, 'x', 16, 12, 'x', 15, 4, 9];

// Setup the graph
$graph = new Graph\Graph(400, 250);
$graph->SetScale('intlin');
$graph->title->Set('Filled line with NULL values');
//Make sure data starts from Zero whatever data we have
$graph->yscale->SetAutoMin(0);

$p1 = new Plot\LinePlot($datay);
$p1->SetFillColor('lightblue');
$graph->Add($p1);

// Output line
$graph->Stroke();
