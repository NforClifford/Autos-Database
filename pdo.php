<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nfor Clifford Yungong-database connect</title>
</head>
<body>
	<?php
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','king','zap'); 
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	?>

</body>
</html>