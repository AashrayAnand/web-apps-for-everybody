<html>
<head>
<title>Guessing Game for Aashray Anand</title>
</head>
<body>
<h1>Welcome to my guessing game</h1>
<p><?php
	if( ! isset($_GET['guess']) ){
		echo "Missing guess parameter";
	} else {
		if( strlen($_GET['guess']) < 1 ){
			echo "Your guess is too short";
		} elseif( ! is_numeric($_GET['guess']) ){
			echo "Your guess is not a number";
		} elseif ( $_GET['guess'] < 61) {
			echo "Your guess is too low";
		} elseif ( $_GET['guess'] > 61 ) {
			echo "Your guess is too high";
		} else {
			echo "Congratulations - You are right";
		}
	}
?>
</p>
</body>
</html>