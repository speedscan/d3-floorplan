<html><head>
<meta charset="utf-8">
<title>Floor Plan - local coordinate map layers for D3.js</title>
<!-- <script type="text/javascript" src="lib/jquery/jquery-1.7.2.min.js"></script> -->
<!-- <script type="text/javascript" src="lib/jquery/jquery-ui-1.8.21.custom.min.js"></script> -->
<script  src="https://d3js.org/d3.v2.min.js"></script>
<!-- <script type="text/javascript" src="lib/d3/d3.v2.min.js"></script> -->
<script type="text/javascript" src="d3.floorplan.min.js"></script>
<style type="text/css">
	/* @import url('lib/jquery/jquery-ui.css'); */
	@import url('d3.floorplan.css');
	
	body {
	  font-size: 14px;
	  font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
	  margin: 10px auto 20px;
	  width: 920px;
	  /* background: #ffff00; */
	  line-height: 1.45em;
	}
	a {
	  color: #555;
	}
	a:hover {
	  color: #000;
	}
	ul {
	  margin: 0 20px;
	  padding: 0;
	}
	div.code {
		border: 1px solid #ccc;
		background: #000000;
		margin: 0px 0 0px 0;
		/* padding: 10px; */
		width: 920px;
	}
</style>
</head>
<body>
<div id="demo"></div>

<script id="demo-code" type="text/javascript">
    
    var xscale = d3.scale.linear()
               .domain([0,920])
               .range([0,920]),
    yscale = d3.scale.linear()
               .domain([0,874])
               .range([0,874]),
    map = d3.floorplan().xScale(xscale).yScale(yscale),
    imagelayer = d3.floorplan.imagelayer(),
    // heatmap = d3.floorplan.heatmap(),
    // vectorfield = d3.floorplan.vectorfield(),
    // pathplot = d3.floorplan.pathplot(),
    overlays = d3.floorplan.overlays().editMode(false),
    mapdata = {};
    console.log(xscale);
mapdata[imagelayer.id()] = [{
    url: 'zone.png',
    x: 0,
    y: 0,
    height: 874,
    width: 920
     }];

map.addLayer(imagelayer)
//    .addLayer(heatmap)
//    .addLayer(vectorfield)
//    .addLayer(pathplot)
   .addLayer(overlays);
   

d3.json("demo-data.json", function(data) {
	// mapdata[heatmap.id()] = data.heatmap;
	mapdata[overlays.id()] = data.zone;
	// mapdata[vectorfield.id()] = data.vectorfield;
	// mapdata[pathplot.id()] = data.pathplot;
	
	d3.select("#demo").append("svg")
		.attr("height", 874).attr("width",920)
		.datum(mapdata).call(map);
});


</script>
