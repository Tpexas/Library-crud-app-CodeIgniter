<h1>Nariai</h1>

<a href="nariai/naujas" class="btn btn-light m-3">Naujas narys</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Vardas</th>
  <th>Pavardė</th>
  <th>El. paštas</th>
  <th>Tel. nr.</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php foreach ($nariai as $narys ): ?>
<tr>
  <td><?=$narys ['id']?></td>
  <td><?=$narys ['vardas']?></td>
  <td><?=$narys ['pavarde']?></td>
  <td><?=$narys ['el_pastas']?></td>
  <td><?=$narys ['tel_nr']?></td>
  <td><a class="btn btn-primary btn-sm" href="nariai/redaguoti/<?=$narys['id']?>">Redaguoti</a>
    <a class="btn btn-danger btn-sm" href="nariai/istrinti/<?=$narys['id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a></td>
</tr>
<?php endforeach ?>
</tbody>
<tfoot>
  <tr>
    <td colspan="10"></td>
  </tr>
</tfoot>
</table>
