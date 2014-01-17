<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex" />
</head>

<body>
<blockquote style="background-color:#FFC600;padding:10px;font-family:'Courier New', Courier, monospace;">
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