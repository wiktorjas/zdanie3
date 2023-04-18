<?php
session_save_path("session/"); //Korzystałem z ineternetu i z poradniku nie jestem pewien czy jest dobrze
session_start();
 
include '';

if (isset($_POST['log_in'])) {
	$login = $_POST['login'];
	$haslo = $_POST['pass'];
	$haslo1 = md5($haslo);
 
	if ($zapytanie = "SELECT * FROM `uzytkownicy` WHERE `pass` = ? AND `login` = ?") {
		$result = $db_mysqli->prepare($zapytanie);
		$result->bind_param('ss', $haslo1, $login);
		$result->execute();
		$result->close();
	} elseif ($db_mysqli->error) {
		echo "Could not prepare SQL: " . $db_mysqli->error;
	}
 
	$result2 = mysqli_num_rows($result);
	$result3 = mysqli_fetch_array($result);
	$result4 = mysqli_fetch_array($result);
 
	
	print_r($result2);
	echo ($result3);

 
 

 echo printf ($result2);
 echo "<br />";
 echo printf ($result3);
  echo "<br />";
   echo printf ($result4);

}
?>
