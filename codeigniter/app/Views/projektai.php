
		<h1>Projektai</h1>
		<div class="">
			<?=$test?>
		</div>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Pavadinimas</th>
			<th>Svarba</th>
			<th>Pradžia</th>
			<th>Trukmė</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($projektai as $projektas): ?>
		<tr>
			<td><?=$projektas['id']?></td>
			<td><?=$projektas['pavadinimas']?></td>
			<td><?=$projektas['svarba']?></td>
			<td><?=$projektas['pradzia']?></td>
			<td><?=$projektas['trukme_men']?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
