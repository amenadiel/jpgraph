<?php

/**
 * JPGraph v4.0.0
 */

require_once __DIR__ . '/../../src/config.inc.php';

use Amenadiel\JpGraph\Graph;

// Setup some data to use for the contour
$data = [
    [12, 12, 10, 10],
    [10, 10, 8, 14],
    [7, 7, 13, 17],
    [4, 5, 8, 12],
    [10, 8, 7, 8]];

// create a basic graph as a container
$__width  = 300;
$__height = 300;
$graph    = new Graph\Graph($__width, $__height);
$graph->SetMargin(30, 30, 40, 30);
$graph->SetScale('intint');
$graph->SetMarginColor('white');

// Setup title of graph$example_title='Filled contour plot'; $graph->title->set($example_title);
$graph->title->SetFont(Graph\Configs::getConfig('FF_VERDANA'), Graph\Configs::getConfig('FS_BOLD'), 12);

$graph->subtitle->Set('(Manual colors)');
$graph->subtitle->SetFont(Graph\Configs::getConfig('FF_VERDANA'), Graph\Configs::getConfig('FS_ITALIC'), 10);

// Create a new contour plot with only 3 isobars
$cp = new FilledContourPlot($data, 3);

// Specify the colors manually
$isobar_colors = ['lightgray', 'teal:1.3', 'orange', 'red'];
$cp->SetIsobarColors($isobar_colors);

// Use only blue/red color schema
$cp->UseHighContrastColor(true);

// Flip visually
$cp->SetInvert();

// Fill the contours
$cp->SetFilled(true);

// Display labels
$cp->ShowLabels(true);

// No lines
$cp->ShowLines(false);

// And add the plot to the graph
$graph->Add($cp);

// Send it back to the client
$graph->stroke();
