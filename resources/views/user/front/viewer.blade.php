<html>
<head>
<?php
$file=$_GET["pathfile"];
?>
<title>Doc View</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="viewer/jquery.gdocsviewer.min.js"></script>
<style type="text/css">
/* Style the second URL with a red border */
#test-gdocsviewer {
	border: 5px red solid;
	padding: 20px;
	width: 650px;
	background: #ccc;
	text-align: center;
}
/* Style all gdocsviewer containers */
.gdocsviewer {
	margin:10px;
}
</style>
<script type="text/javascript">
	/*<![CDATA[*/
	$(document).ready(function() {
		$('a.embed').gdocsViewer({width: 900, height: 500});
		$('#embedURL').gdocsViewer();
	});
	/*]]>*/
</script>
</head>
@extends('user.index')
@section('title')
	Zdev- index
@stop
@section('front')
<body style="background:#999; font-family:arial, helvetica, sans-serif; font-size:14px;">
<div style="background:#fff; width:960px; margin:0 auto; padding:20px;">
	<h1><center>Titre</center></h1>
	<hr size="1" />
	<div>
	<center>
		<h3>FIchier:</h3>
		<a href="http://localhost/zdev/public/documents/<?php echo $file ?>" class="embed">Download file</a>
	</center>
	</div>
</div>
@stop
</body>
</html>