<?php
	$playing = false;
	if( ! isset($_GET['name']) || strlen($_GET['name']) < 1) {
    	die('Name parameter missing');
	}

	if(isset($_POST['logout'])){
		header('Location: index.php');
		return;
	}
	$names = array("rock", "paper", "scissors");
	function play($computer,$human){
		# return tie when values are same
		if($computer == $human){
			return "Tie";
		}
		# 
		if((strlen($human) > strlen($computer) && (strlen($human) % strlen($computer) != 0)) || (strlen($computer) % strlen($human) == 0)){
			return "You Win";
		}
		return "You Lose";
	}

	function test() {
		$output = "";
		$z = array("Rock", "Paper", "Scissors");
		foreach ($z as $human) {
			foreach ($z as $computer) {
				$output .= "Human=".$human." Computer=".$computer." Result=".play($computer,$human)."\n";
			}
		}
		return $output;
	}
	if(isset($_POST['action'])){
		$human = $_POST['action'];
		if($human == "Test"){
			$playing = test();
		} else {
			# use array_rand to pick random key
			# use this random key to set $computer to random value
			$random = array_rand($names);
			$computer = $names[$random];
			$playing = "Human=".$human." Computer=".$computer." Result=".play($computer,$human);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rock Paper Scissors</title>
</head>
<body>
	<div class="container">
		<h1>Rock Paper Scissors</h1>
		<?php
			echo('<p>Welcome: '.htmlentities($_GET['name']).'</p>');
		?>
		<form method="POST">
			<select name="action">
				<option value="select" selected>Select</option>
				<option value="Rock">Rock</option>
				<option value="Paper">Paper</option>
				<option value="Scissors">Scissors</option>
				<option value="Test">Test</option>
			</select>
			<input type="submit" name="play" value="Play">
			<input type="submit" name="logout" value="Logout">
		</form>
		<?php
			if($playing === false){
				echo "<pre>Please select a strategy and play</pre>";
			} else {
				echo "<pre>".htmlentities($playing)."</pre>";
			}
		?>
	</div>
</body>