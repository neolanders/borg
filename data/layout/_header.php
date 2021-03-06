<?php
//
// Header template takes following vars:
//	  $title
//	  $active (tab, i.e. "Discuss")
//
function topnav($active) {
	$pagetabs = array(
		"Home"    => "/",
		"Docs"    => "/docs/",
		"Demos"   => "/demos/",
		"Explore" => "/explore/",
		"Bugs"    => "http://bugs.browserplus.org/",
		"IRC"     => "/discuss/",
		"Blog"    => "/blog/",
		"About"   => "/about/");
	foreach($pagetabs as $label => $url) {
		$li = ($label == $active ? '<li class="active">' : '<li>');
		echo "$li<a href=\"$url\">$label</a></li>\n";
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/yui/2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css">
	<link rel="stylesheet" type="text/css" href="/style/site.css" media="screen">
	<?php 
	if (isset($stylesheets)) {
		foreach($stylesheets as $ss) {
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$ss\">\n";
		}
	}
	?>

</head>
<body<?php if (isset($onload)) { echo " " . $onload; } ?>> 

<div id="header">
	<div class="wrapper">
		<div id="logo">
			<span><a href="/" title="Go to homepage"><img src="/images/site-logo.png" alt="BrowserPlus" /></a></span>
		</div>
	</div>
</div>
<div id="topnav">
	<ul>
		<?php topnav($active); ?>
	</ul>
</div>


	<div id="doc2" class="yui-t7"> 
		<div id="hd" role="banner"> 
		</div> 
	
