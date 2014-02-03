<?php // content="text/plain; charset=utf-8"
	$data = explode(",",$_GET['a']);
	$datalabel = explode(",", $_GET['b']);
	$datatitle = $_GET['c'];
 
	require_once ('jpgraph/jpgraph.php');
	require_once ('jpgraph/jpgraph_bar.php');
	
	// Create the graph. These two calls are always required
	$graph = new Graph(650,500,'auto');
	$graph->SetScale("textlin");
	
	//$theme_class="DefaultTheme";
	//$graph->SetTheme(new $theme_class());
	
	// set major and minor tick positions manually
	//$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
	//$graph->SetBox(false);
	
	$top = 60;
	$bottom = 30;
	$left = 100;
	$right = 30;
	$graph->Set90AndMargin($left,$right,$top,$bottom);
	
	$graph->SetShadow();
	
	$graph->xaxis->SetTickLabels($datalabel);
	
	// Label align for X-axis
	$graph->xaxis->SetLabelAlign('right','center','right');
	 
	// Label align for Y-axis
	$graph->yaxis->SetLabelAlign('center','bottom');
	
	$graph->title->Set($datatitle);
	
	$graph->ygrid->SetColor('white');
	$graph->ygrid->SetFill(false);
	
	//$graph->yaxis->HideLine(true);
	//$graph->yaxis->HideTicks(true,true);
	
	// Create the bar plots
	$b1plot = new BarPlot($data);
	$b1plot->SetColor("white");
	$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
	$b1plot->SetWidth(45);
	
	// ...and add it to the graPH
	$graph->Add($b1plot);
	
	
	
	// Display the graph
	$graph->Stroke();
?>
