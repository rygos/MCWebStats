<?php
	$data = explode(",",$_GET['a']);
	$datalabel = explode(",", $_GET['b']);
	
	//Graph
	require_once ('jpgraph/jpgraph.php');
	require_once ('jpgraph/jpgraph_pie.php');
	require_once ('jpgraph/jpgraph_pie3d.php');
	
	$graph = new PieGraph(260,160);

	$theme_class= new UniversalTheme;
	$graph->SetTheme($theme_class);

	// Set A title for the plot
	//$graph->title->Set("A Simple 3D Pie Plot");

	// Create
	$p1 = new PiePlot3D($data);
	$graph->Add($p1);

	$p1->ShowBorder();
	$p1->SetColor('red');
	$p1->ExplodeSlice(1);
	$p1->SetLabels($datalabel,0.5);
	$graph->Stroke();
	