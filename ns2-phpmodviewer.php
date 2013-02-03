<?php
// insert the path to your ns2 mods folder below
// put an extra backslash for every backslash you have on the path (e.g. '\' becomes '\\')
$path = '';
?>
<html>
<head>
<title>NS2 Mod List</title>

<style type="text/css">
body {background-color:black;font:14px Arial, Helvetica, serif;}
.item {background-color:white;border:1px solid #333;float:left;height:80px;margin:4px;padding:4px;}
.item h3 {margin:0;padding:0;}
</style>
</head>

<body style="background-color:black;">
<?php
if ( $handle = opendir($path) ) {
	
	$array;
	
    while ( false !== ( $entry = readdir($handle) ) ) {
		$array[] = $entry;
    }
	foreach ($array as $dir) {
		if ($dir !== '.' and $dir !== '..') {
			echo '<div class="item"><h3>'.$dir.'</h3>';
			$mod = nl2br(file_get_contents($path.'\\'.$dir.'\\.modinfo'));
			echo $mod;
			echo '</div>';
		}
	}

    closedir($handle);
}
?>
</body>

</html>