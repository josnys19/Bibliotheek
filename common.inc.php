<?php
$connStr = 'mysql:host=localhost; dbname=bibliotheek';
$user = 'beheerder';
$password = 'beheerder';

function toonKopTekst($titel)
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
 	 <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
 	 <title><?=htmlspecialchars($titel)?></title>
	</head>
	<body>
		<header>
			<h1><?=htmlspecialchars($titel)?></h1>
			<nav>
				<a href="boeken.php">Overzicht van de boeken</a>
				<a href="schrijvers.php">Overzicht van de schrijvers</a>
			</nav>
		</header>
		<hr/>
<?php
}

function toonVoetTekst()
{
	?>
	</body>
	</html>
<?php
}

$conn = new PDO($connStr,$user,$password);
?>