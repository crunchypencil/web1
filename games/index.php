<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex" />
<title>Untitled Document</title>
<style type="text/css">
.tiny {
	font-family: Georgia, Georgia, "Times New Roman", Times, serif;
	font-style:italic;
	font-weight:normal;
}
</style>
</head>

<body>
<h3 class="tiny">Crunchy Pencil Code Vault</h3>
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
