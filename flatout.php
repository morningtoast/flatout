<?
	if ($_POST["html"]) {
		$source = current(explode(".", basename($_POST["url"])));

		if ($_POST["suffix"]) { $source .= "_".$_POST["suffix"]; }

		$saveas = "output/".$source.".html";

		$fr = fopen($saveas, "w");
		fwrite($fr, $_POST["html"]);
		fclose($fr);

		echo $saveas;
		exit();
	}

	function inc_static($path, $vars=false) {
		$source = file_get_contents($path);

		if ($vars) {
			foreach($vars as $key => $value){
			    $source = str_replace('{{'.$key.'}}', $value, $source);
			}
		}

		echo "<!-- START: ".$path." -->\n";
		echo $source;
		echo "<!-- END: ".$path." -->\n";
	}

	function inc_dynamic($path, $vars) {
		extract($vars);

		echo "<!-- START: ".$path." -->\n";
		include($path);
		echo "<!-- END: ".$path." -->\n";
	}
?>
<? if (!$_GET["compile"]) { ?>
<script>
	var localcompiler = "<?= basename(__FILE__); ?>";

	function onready(fn) {if (document.addEventListener) {document.addEventListener('DOMContentLoaded', fn); } else {document.attachEvent('onreadystatechange', function() {if (document.readyState === 'interactive') fn(); }); } }
	function fetch(url, type, data, callback) {if (type == "GET") {url = url+"?"+data; } var r = new XMLHttpRequest(); r.open(type, url, true); if (type == "POST") {r.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" ); } r.onreadystatechange = function () {if (r.readyState != 4 || r.status != 200) return; callback(r.responseText); }; if (type == "POST") {r.send(data); } else {r.send(); } }

	function compile(url) {
		fetch(url, "GET", "compile=1", function(r) {
			var prefill = "";

			if(typeof(Storage)!=="undefined") {
				if (sessionStorage.exportname.length > 0) {
					prefill = sessionStorage.exportname;
				}
			}

			var suffix = prompt("Variation extension (optional)", prefill);

			if(typeof(Storage)!=="undefined") {
				sessionStorage.exportname = suffix;
			}

			fetch(localcompiler,"POST","suffix="+suffix+"&url="+url+"&html="+r, function(x) {
				alert("Flat file created: "+x);
			});
		});
	}

	onready(function() {
		document.body.innerHTML += '<button type="button" onclick="compile(\''+window.location+'\')" style="position:absolute;top:10px;right:10px">Compile</button>';
	});
</script>
<? } ?>
