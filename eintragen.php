<!DOCTYPE html>
<html>
	<head>
		<title>Quizduell Antworten.de</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Quiz, Duell, Quizduell, Ant, Worten, Antworten, Fragen, Fragen und Antworten, Answers, Qustions" />
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="frage">
			<br>
			<form name="frage" action="eintragen.php" method="POST">
			<input type="text" name="frage" size="50" placeholder="Frage eintragen...">
			<select name="kat">
				<option value="Computerspiele">Computerspiele</option>
				<option value="Wunder der Technik">Wunder der Technik</option>
				<option value="Essen und Trinken">Essen und Trinken</option>
				<option value="Macht und Geld">Macht und Geld</option>
				<option value="Kinofilme">Kinofilme</option>
				<option value="Körper und Geist">Körper und Geist</option>
				<option value="Comics">Comics</option>
				<option value="Im Labor">Im Labor</option>
				<option value="TV-Serien">TV-Serien</option>
				<option value="Musik und Hits">Musik und Hits</option>
				<option value="Medien und Unterhaltung">Medien und Unterhaltung</option>
				<option value="Bücher und Wörter">Bücher und Wörter</option>
				<option value="Rund um die Welt">Rund um die Welt</option>
				<option value="Glaube und Religion">Glaube und Religion</option>
				<option value="Kunst und Kultur">Kunst und Kultur</option>
				<option value="Drausen im Grünen">Drausen im Grünen</option>				
				<option value="Sport und Freizeit">Sport und Freizeit</option>												
				<option value="Zeugen der Zeit">Zeugen der Zeit</option>
				<option value="Die 2000">Die 2000</option>	
			</select>
			<input type="text" name="antwort" size="50" placeholder="Antwort eintragen...">
			<input type="submit" value="Frage eintragen">
			</form>
			<br>
		</div>
		
		<br>
		
		<div id="antwort">
			<?php
			if(isset($_POST['frage']) && isset($_POST['kat']) && isset($_POST['antwort']))
			{
				$online = "0";
				
				if($online == "1")
				{
					$MySQL = mysql_connect("0000", "0000", "0000")
					or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
					mysql_select_db("00000") or die ("Datenbank konnte nicht ausgew&auml;t werden");		
				}
				elseif($online == "0")
				{
					$MySQL = mysql_connect("0000", "0000", "0000")
					or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
					mysql_select_db("00000") or die ("Datenbank konnte nicht ausgew&auml;hlt werden");		
				}		
		
				if(isset($_POST['frage']) && $_POST['frage'] != "")
				{
					$frage = $_POST['frage'];
					$frage = strip_tags($frage);
					$frage = htmlspecialchars($frage, ENT_QUOTES);
					$frage = trim($frage);
				}
				if(isset($_POST['kat']) && $_POST['kat'] != "")
				{
						$kat = $_POST['kat'];
						$kat = strip_tags($kat);
						$kat = htmlspecialchars($kat, ENT_QUOTES);
						$kat = trim($kat);						
				}
				if(isset($_POST['antwort']) && $_POST['antwort'] != "")
				{
						$antwort = $_POST['antwort'];
						$antwort = strip_tags($antwort);
						$antwort = htmlspecialchars($antwort, ENT_QUOTES);
						$antwort = trim($antwort);						
				}				
				
					//$sql = "INSERT INTO info WHERE frage='$frage', kat='$kat', antwort='$antwort'";
					$sql = "INSERT INTO info (frage, kat, antwort) VALUES ( '$frage', '$kat', '$antwort')";
					$query = mysql_query($sql);
					if($query == true)
					{
						echo"Frage erfolgreich gespeichert.";
					}
			}else{
				echo"";
			}			
			?>
			<br>
		</div>
		
		<br>
		
		<div id="footer">
			<br>
			Footer mit Links etc
			<br>
		</div>
	</body>
</html>
