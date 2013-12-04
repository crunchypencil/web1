<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV Reader</title>

<style type="text/css">
tr {
	font-family:Arial, Helvetica, sans-serif;
	font-size:1.1em;
	text-align:left;
}
/* note: these CSS3 pseudo classes require FF 3.1+, Safari 3.1+, or IE8+ */
tr:nth-of-type(even) { /* even rows */
    	background-color:#eee;
}
tr:nth-of-type(1) { /* first row */
    	background-color:#000;
	color:#fff;
	text-align:center;
}
</style>

</head>
<body>

<?php

$filename = "TEST.csv";
// Error for missing file
if (!$filename) {
    echo "Error: file missing";
    exit;
}

// File data
date_default_timezone_set('America/New_York');
echo "<p>file: ". $filename . ", " . filesize($filename) . "B, Modified: " . date ("F d Y H:i:s", filemtime($filename)) . "</p>";

// Format and write out the table
echo "<table id='csvtable' border=0 cellpadding=8 cellspacing=0>";
echo "<tr><td>";
function viewlog($filename) {
    $fp = fopen($filename,"r");
    $file = fread($fp,65535);
    $replaced = str_replace(",", "</td><td>", $file);
    $replaced2 = str_replace("\n", "</td></tr><tr><td>", $replaced);
    $replaced3 = str_replace("\r", "", $replaced2);
    fclose($fp);
    return $replaced3;
}
echo viewlog($filename);
// Close it off
echo "</td></tr></table>";

?>

</body>
</html>
