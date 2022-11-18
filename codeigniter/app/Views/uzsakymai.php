<h1>Užsakymai</h1>


<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Nario ID</th>
  <th>Knygos ID</th>
  <th>Išdavimo data</th>
  <th>Grąžinti iki</th>
  <th>Būsena</th>
  <th>Grąžinimo data</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php foreach ($uzsakymai as $uzsakymas ): ?>
<tr>
  <td><?=$uzsakymas ['id']?></td>
  <td><?=$uzsakymas ['nario_id']?></td>
  <td><?=$uzsakymas ['knygos_id']?></td>
  <td><?=$uzsakymas ['isdavimo_data']?></td>
  <td><?=$uzsakymas ['grazinti_iki']?></td>
  <td><?=$uzsakymas ['busena']?></td>
  <td><?=$uzsakymas ['grazinimo_data']?></td>
  <td><a class="btn btn-primary btn-sm" href="uzsakymai/grazinti/<?=$uzsakymas['id']?>">Grąžinti</a></td>
</tr>
<?php endforeach ?>
</tbody>
<tfoot>
  <tr>
    <td colspan="10"></td>
  </tr>
</tfoot>
</table>
