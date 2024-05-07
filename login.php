<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nfor Clifford Yungong - login page</title>
</head>
<body>
	<div class="form">
		<form method="POST" action="<?PHP echo htmlspecialchars($_POST['PHP_SELF']); ?>">
			Email: <input type="text" name="email" ><br><br>
			Password:<input type="text" name="pasword">
			<input type="submit" name="submit" value="Log in">
			<input type="submit" name="cancel" value="cancel">

			
		</form>
	</div>

</body>
</html>