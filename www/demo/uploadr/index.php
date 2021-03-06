<?php 
require("../../../php/vars.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Uploadr</title>
	<link rel="stylesheet" type="text/css" href="uploadr.css" media="screen">
</head>
<body>
	<div id="dropArea" class="hoverOff"></div>

	<h1>Uploadr</h1>

	<p>
		<em>
			Parallel uploads, chunking, compression, so many options to upload...  If only there was a 
			way to test all methods.
		</em>
	</p>
	<p>
		A live side by side comparison of techniques to reduce upload time by doing more on the client.
		Drop some files on the <strong>hungry duck</strong> and watch the results.
	</p>


	<table cellpadding=2 cellspacing=1>
		<thead>
			<tr>
				<th>Method</th>
				<th>File</th>
				<th>Size</th>
				<th>Time(1)</th>
				<th>Time(2)</th>
				<th>Time(3)</th>
			</tr>
		</thead>
		<tbody>
			<tr id="r1">
				<th>Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r2">
				<th>Parallel</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r3">
				<th>Resize + Chunks + Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r4">
				<th>Resize + Parallel</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r5">
				<th>Resize + LZMA + Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r6">
				<th>Resize + LZMA + Parallel</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r7">
				<th>Resize + ZIP + Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r8">
				<th>Resize + TAR + GZIP + Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
			<tr id="r9">
				<th>Resize + TAR + BZIP2 + Serial</th>
				<td class="c0"></td><td class="c1"></td><td class="c2"></td><td class="c3"></td><td class="c4"></td>
			</tr>
		</tbody>
	</table>

	<div id="console">
		<h3>Console</h3>
		<div id="result"></div>
	</div>

	<p class="services">
		* This demo is built on the
		<a href="http://browserplus.org/docs/services/DragAndDrop.html">DragAndDrop</a>
		and 
		<a href="http://browserplus.org/docs/services/FileTransfer.html">FileTransfer</a> services.
		For archiving, compression and chunking, these additional services are used: 
		<a href="http://browserplus.org/docs/services/Archiver.html">Archiver</a>, 
		<a href="http://browserplus.org/docs/services/LZMA.html">LZMA</a> and 
		<a href="http://browserplus.org/docs/services/FileAccess.html">FileAccess</a>.
		Resize is image resizing.  If a large image (gif, jpg or png) is dropped, 
		<a href="http://browserplus.org/docs/services/ImageAlter.html">ImageAlter</a> will resize
		the image to a maximum width or height of 800px.
	</p>

<script src="<?php echo BROWSERPLUS_MIN_JS; ?>"></script>
<script src="http://yui.yahooapis.com/3.0.0/build/yui/yui-min.js"></script>
<script src="/js/json2.js"></script>
<script src="uploadr.js"></script>

<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-11920567-1']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script');
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    ga.setAttribute('async', 'true');
    document.documentElement.firstChild.appendChild(ga);
})();
</script>

</body>
</html>
