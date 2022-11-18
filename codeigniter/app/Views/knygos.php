<h1>Knygos</h1>


<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Autoriaus ID</th>
  <th>Pavadinimas</th>
  <th>Kategorija</th>
  <th>Metai</th>
  <th>Populiarumas</th>
  <th>likutis</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php foreach ($knygos as $knyga ): ?>
<tr>
  <td><?=$knyga ['id']?></td>
  <td><?=$knyga ['autoriaus_id']?></td>
  <td><?=$knyga ['pavadinimas']?></td>
  <td><?=$knyga ['kategorija']?></td>
  <td><?=$knyga ['metai']?></td>
  <td><?=$knyga ['populiarumas']?></td>
  <td><?=$knyga ['likutis']?></td>
  <td><a class="btn btn-primary btn-sm" href="knygos/redaguoti/<?=$knyga['id']?>">Redaguoti</a>
  <a class="btn btn-danger btn-sm" href="knygos/istrinti/<?=$knyga['id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a></td>
</tr>
<?php endforeach ?>
</tbody>
<tfoot>
  <tr>
    <td colspan="10"></td>
  </tr>
</tfoot>
</table>
