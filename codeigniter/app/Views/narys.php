<h1>Narys</h1>

<?=form_open() ?>

<input type="hidden" name="id" value="<?=$narys['id']??''?>">

  <div class="mb-3">
    <label>Vardas</label>
    <input class="form-control" type="text" name="vardas" value="<?=$narys['vardas']??''?>" required>
  </div>

  <div class="mb-3">
    <label>Pavardė</label>
    <input class="form-control" type="text" name="pavarde" value="<?=$narys['pavarde']??''?>" required>
  </div>

<div class="mb-3">
  <label>El. Paštas</label>
<input class="form-control" type="text" name="el_pastas" value="<?=$narys['el_pastas']??''?>" required>
</div>

<div class="mb-3">
  <label>Tel. nr.</label>
<input class="form-control" type="text" name="tel_nr" value="<?=$narys['tel_nr']??''?>" required>
</div>

<div class="mb-3">
  <label></label>
<input class="form-control btn btn-success" type="submit" name="<?=($edit)?'redaguoti':'naujas'?>" value="Išsaugoti">
</div>

<?php if ($edit):?>
  <h1>Knygos</h1>

    <table class="table">
  		<thead>
        <tr>
          <th>ID</th>
          <th>Pavadinimas</th>
          <th>Kategorija</th>
          <th>Metai</th>
          <th>Populiarumas</th>
          <th>Likutis</th>
          <th>Veiksmai</th>
        </tr>
  		</thead>
  		<tbody>
        <?php foreach ($visos_knygos as $vknyga): ?>
          <tr>
          <td><?=$vknyga['id']?></td>
          <td><?=$vknyga['pavadinimas']?></td>
          <td><?=$vknyga['kategorija']?></td>
          <td><?=$vknyga['metai']?></td>
          <td><?=$vknyga['populiarumas']?></td>
          <td><?=$vknyga['likutis']?></td>
          <td><a class="btn btn-primary btn-sm" href="nariai/prideti_uzsakyma/<?=$vknyga['id']?>/<?=$narys['id']?>/<?=$vknyga['populiarumas']?>">Pridėti užsakymą</a></td>

            </tr>
      <?php endforeach ?>
  		</tbody>
  		<tfoot>
  		</tfoot>
  	</table>
    <?php endif ?>


</form>
