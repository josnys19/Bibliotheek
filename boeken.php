<?php
include('common.inc.php');

$sql = "SELECT schrijvers.id AS schrijverId, voornaam, achternaam, boeken.*
        FROM schrijvers, boeken
        WHERE schrijver=schrijvers.id
        ORDER BY titel";

$q = $conn->query($sql);

toonKopTekst('Boeken');
?>
<table width="60%" border="1" cellpadding="3">
	<tr>
		<th>Schrijver</th>
		<th>Titel</th>
		<th>ISBN</th>
		<th>Uitgeverij</th>
		<th>Jaar</th>
		<th>Samenvatting</th>
	</tr>
<?php
while($r = $q->fetch(PDO::FETCH_ASSOC))
{
	?>
	<tr>
		<td>
			<a href="schrijver.php?id=<?=$r['schrijverId']?>">
				<?=htmlspecialchars("$r[voornaam] $r[achternaam]")?>
			</a>
		</td>
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
<?php
toonVoetTekst();
?>