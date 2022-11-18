<h1>Autoriai</h1>

<a href="autoriai/naujas" class="btn btn-light m-3">Naujas autorius</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Vardas</th>
  <th>Pavardė</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php foreach ($autoriai as $autorius ): ?>
<tr>
  <td><?=$autorius ['id']?></td>
  <td><?=$autorius ['vardas']?></td>
  <td><?=$autorius ['pavarde']?></td>
  <td><a class="btn btn-primary btn-sm" href="autoriai/redaguoti/<?=$autorius['id']?>">Redaguoti</a>
    <a class="btn btn-danger btn-sm" href="autoriai/istrinti/<?=$autorius['id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a></td>
</tr>
<?php endforeach ?>
</tbody>
<tfoot>
  <tr>
    <td colspan="10"></td>
  </tr>
</tfoot>
</table>
