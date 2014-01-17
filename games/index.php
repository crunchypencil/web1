<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex" />
</head>

<body>
<blockquote style="background-color:#FFF;padding:13px;font-family:'Courier New', Courier, monospace;font-weight:bold;">


<?php

$dir="."; // Directory where files are stored

if ($dir_list = opendir($dir))
{
while(($filename = readdir($dir_list)) !== false)
{
?>
<p><a href="<?php echo $filename; ?>"><?php echo $filename; ?></a></p>
<?php
}
closedir($dir_list);
}

?>
</blockquote>
</body>
</html>