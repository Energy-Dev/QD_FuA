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
			<form name="frage" action="index.php" method="POST">
			<input type="text" name="frage" size="50" placeholder="Frage suchen..." autofocus>
			<select name="kat">
				<option value="all">Alle Kategorien</option>
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
			<input type="submit" value="Frage suchen">
			</form>
			<br>
		</div>
		
		<br>
		
		<div id="antwort">
			<?php
				$online = "0";
				
				if($online == "1")
				{
					$MySQL = mysql_connect("localhost", "0000", "0000")
					or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
					mysql_select_db("0000") or die ("Datenbank konnte nicht ausgew&auml;t werden");		
				}
				elseif($online == "0")
				{
					$MySQL = mysql_connect("localhost", "0000", "0000")
					or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
					mysql_select_db("0000") or die ("Datenbank konnte nicht ausgew&auml;hlt werden");		
				}		
		
				if(isset($_POST['frage']) && $_POST['frage'] != "")
				{
					$frage = $_POST['frage'];
					$frage = strip_tags($frage);
					$frage = htmlspecialchars($frage, ENT_QUOTES);
					$frage = trim($frage);
					
					if(isset($_POST['kat']) && $_POST['kat'] != "all")
					{
						$kat = $_POST['kat'];
						$kat = strip_tags($kat);
						$kat = htmlspecialchars($kat, ENT_QUOTES);
						$kat = trim($kat);		
						echo "Suchergebnis zur Frage <span class=fett>$frage</span> in der Kategorie <span class=fett>$kat</span>:";
						$sql = "SELECT * FROM info WHERE kat='$kat' AND (frage like '%$frage%')";
					}else{					
						echo "Suchergebnis zur Frage <span class=fett>$frage</span> in allen Kategorien:";
						$sql = "SELECT * FROM info WHERE (frage like '%$frage%') ORDER BY kat";
					}
					
					$query = mysql_query($sql) OR die("Error: $sql <br>".mysql_error());
					
					?>
					<table>
					<tr>
					<td>Frage</td>
					<td>Kategorie</td>
					<td>Antwort</td>
					</tr>			
					<?php					
					while ($array = mysql_fetch_object($query))
					{
						echo"<tr>";
						echo"<td>$array->frage</td>";
						echo"<td>$array->kat</td>";
						echo"<td>$array->antwort</td>";
						echo"</tr>";						
					}
				}												
			?>
			</table>
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
