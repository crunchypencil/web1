<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV Reader</title>

<style type="text/css">
#header { width: 900px; }
h2 { 
 margin: 40px 0 0 0;
 padding-top: 0.2em;
 padding-left: 0.2em;
 font-family: Arial, Helvetica, sans-serif;
 text-align:left;
 color:#29395d;
 }
#links {
 font-size:14px;
 font-family: Arial, Helvetica, sans-serif;
 text-align:right;
 color:#29395d;
 } 
#playlist {
 font-family:Arial, Helvetica, sans-serif;
 font-size:1.1em;
}
#playlist tbody tr td {}
 
.first {
 background-color: #0d1362;
 color:#fff;
 font-weight: bold;
}
 
.file {
 font-family:"Courier New", Courier, monospace;
 size:1.0em;
 color:#fff;
 font-weight:normal;
}
</style>
<script type="text/javascript">
<!--
  // this function is need to work around 
  // a bug in IE related to element attributes
function hasClass(obj) {
 var result = false;
 if (obj.getAttributeNode("class") != null) {
  result = obj.getAttributeNode("class").value;
 }
 return result;
}   
function stripe(id) {
    // the flag we'll use to keep track of 
    // whether the current row is odd or even
    var even = false;
  
    // if arguments are provided to specify the colours
    // of the even & odd rows, then use the them;
    // otherwise use the following defaults:
    var evenColor = arguments[1] ? arguments[1] : "#fff";
    var oddColor = arguments[2] ? arguments[2] : "#eee";
  
    // obtain a reference to the desired table
    // if no such table exists, abort
    var table = document.getElementById(id);
    if (! table) { return; }
    
    // by definition, tables can have more than one tbody
    // element, so we'll have to get the list of child
    // &lt;tbody&gt;s 
    var tbodies = table.getElementsByTagName("tbody");
    // and iterate through them...
    for (var h = 0; h < tbodies.length; h++) {
    
     // find all the &lt;tr&gt; elements... 
      var trs = tbodies[h].getElementsByTagName("tr");
      
      // ... and iterate through them
      for (var i = 0; i < trs.length; i++) {
     // avoid rows that have a class attribute
        // or backgroundColor style
     if (!hasClass(trs[i]) && ! trs[i].style.backgroundColor) {
 
         // get all the cells in this row...
          var tds = trs[i].getElementsByTagName("td");
        
          // and iterate through them...
          for (var j = 0; j < tds.length; j++) {
        
            var mytd = tds[j];
            // avoid cells that have a class attribute
            // or backgroundColor style
         if (! hasClass(mytd) && ! mytd.style.backgroundColor) {
        
        mytd.style.backgroundColor = even ? evenColor : oddColor;
              
            }
          }
        }
      // flip from odd to even, or vice-versa
      even =  ! even;
      } 
    }
}
window.onload=function(){
 stripe('playlist', '#fff', '#dfdfdf');
}
// -->
</script>
</head>
<body>


<p>
<?php

// Dir to open
$dir = "doc";
// File to open
$fil = "test.csv";
$filename = $dir."/".$fil;  

// Error for missing file
if (!$filename) {
	echo "<font color=red>Error: file missing</font>";
	exit;
}

// Format and write out the table
// added $replaced1 to remove double quotes because Martin's CSV file was encapsulating values in ""
echo "<p><table id='playlist' border=0 align='center' cellpadding=8 cellspacing=0 bgcolor='#fff' class='mContent'>";
echo "<tr class='first'><td>";
function viewlog($filename) {
	$fp = fopen($filename,"r");
	$file = fread($fp,65535);
	$replaced = str_replace(",", "</td><td>", $file);
	$replaced1 = str_replace("\"", "", $replaced);
	$replaced2 = str_replace("\n", "</td></tr><tr><td>", $replaced1);
	$replaced3 = str_replace("\r", "", $replaced2);
	fclose($fp);
	return $replaced3;
}
echo viewlog($filename);
echo "</td><td colspan=10></td></tr><tr class='first'><td colspan=10>";

// File data
date_default_timezone_set('America/New_York');
echo "<span class='file'><center>file: $fil&nbsp;&nbsp;&nbsp;" . filesize($filename) . " B&nbsp;&nbsp;&nbsp;modified: " . date ("F d Y H:i:s", filemtime($filename)) . "</center></span>";
echo "</td></tr></table></p><br><br><br>";

exit;
?>
</p>

</body>
</html>