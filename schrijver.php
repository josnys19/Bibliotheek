<?php
include('common.inc.php');

$id = (int)$_REQUEST['id'];

$q = $conn->query("SELECT * FROM schrijvers WHERE id=$id");
$schrijver = $q->fetch(PDO::FETCH_ASSOC);
$q->closeCursor();

if(!$schrijver)
{
	toonKopTekst('Fout');
	echo ("Ongeldige id opgegeven.");
	toonVoetTekst();
	exit;
}

toonKopTekst("Schrijver: $schrijver[voornaam] $schrijver[achternaam]");

$q = $conn->query("SELECT * FROM boeken WHERE schrijver=$id ORDER BY titel");
$q->setFetchMode(PDO::FETCH_ASSOC);
?>
<h2>Details van de schrijver</h2>
<table width="60%" border="1" cellpadding="3">
	<tr>
		<td><strong>Voornaam</strong></td>
		<td><?=htmlspecialchars($schrijver['voornaam'])?></td>
	</tr>
	<tr>
		<td><strong>Achternaam</strong></td>
		<td><?=htmlspecialchars($schrijver['achternaam'])?></td>
	</tr>
	<tr>
		<td><strong>Biografie</strong></td>
		<td><?=htmlspecialchars($schrijver['biografie'])?></td>
	</tr>
</table>
<h2>Lijst van de boeken</h2>
<table width="60%" border="1" cellpadding="3">
	<tr>
		<th>Titel</th>
		<th>ISBN</th>
		<th>Uitgeverij</th>
		<th>Jaar van uitgave</th>
		<th>Korte samenvatting</th>
	</tr>
	<?php
	while($r = $q->fetch())
	{
		?>
		<tr>
			<td><?=htmlspecialchars($r['titel'])?></td>
			<td><?=htmlspecialchars($r['isbn'])?></td>
			<td><?=htmlspecialchars($r['uitgever'])?></td>
			<td><?=htmlspecialchars($r['jaar'])?></td>
			<td><?=htmlspecialchars($r['samenvatting'])?></td>
		</tr>
		<?php
	}
	?>
</table>
<?php toonVoetTekst(); ?>