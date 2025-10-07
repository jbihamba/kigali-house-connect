<?php
session_start();
?>
<head><meta charset="utf-8"></head>
<?php
$output=$_SESSION['output'];
$filename=$_SESSION['filename'];
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
echo $output;
?>
