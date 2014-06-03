<? include("flatout.php"); ?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body { font-family:arial,helvetica,sans-serif; padding:40px; }
	</style>
</head>
<body>
	<h1>Example page using FlatOut</h1>
	<p>This page shows exampled of static and dynamic partials</p>
	<p><a href="readme.html">See the readme for more details</a></p>

	<? inc_static("example_static.html", array("product"=>"Apples", "price"=>"$5.00/dozen")); ?>

	<? inc_dynamic("example_dynamic.php", array("product"=>"Pears", "price"=>"$2.00/dozen")); ?>

	<h2>Now compile</h2>
	<p>Click the <strong>Compile</strong> in the corner and a flat HTML version of this page will be
		created in your <code>output/</code> folder...and it will include all your partials and values!
	</p>
</body>
</html>
