<?php 
session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
	die("Name parameters missing");
}
if (isset($_POST['logout'])) {
	header("location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nfor Clifford Yungong  - Automobile Tracker</title>
</head>
<body>
	<h1>Tracking Autos for  <?php echo $_SESSION['email']; ?></h1>

	 <P style="color: red;" >
	 	<?php
	require_once("pdo.php");

	
	if (isset($_POST['add'])) {
		if (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
			echo "Mileage and year must be numeric";
		}elseif (empty($_POST['make'])) {
			echo "Make is required";
		}else {
			
				$stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES (:mk, :yr, :mi)");
				$stmt->execute(array(':mk'=>$_POST['make'], ':yr'=>$_POST['year'], ':mi'=>$_POST['mileage']));
						$color = "green";		
				echo "<p style='color: $color;'>Record inserted</p>";
								
		}
	}

	$sql = $pdo->query("SELECT * FROM autos");
	$row = $sql->fetchAll(PDO::FETCH_ASSOC);
	?></P>
	<form method="POST">
		<lable for="make">Make:</lable>
		<input type="text" name="make" id="make"><br><br>
		<label for="Mileage">Mileage:</label>
		<input type="text" name="mileage" id="Mileage"><br><br>
		<label for="year">Year:</label>
		<input type="text" name="year" id="year"><br><br>
		<button type="submit" name="add">Add</button>
		<button type="submit" name="logout">Logout</button>
	</form><br>
	<h3>Automobiles</h3>

	<p><?php
	
foreach ( $row as $ro ) {
    echo "<b>.</b> ";
	echo htmlspecialchars("<b>");
    
    echo($ro['make']);
    echo "     ";
    echo($ro['mileage']);
    echo "     ";
    echo($ro['year']);
    echo "<br>";
}
?></p>
	
</body>
</html>