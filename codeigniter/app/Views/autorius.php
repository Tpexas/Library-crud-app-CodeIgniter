<h1>Autorius</h1>

<?=form_open() ?>

<input type="hidden" name="id" value="<?=$autorius['id']??''?>">

<input name="chrome-autofill-dummy1" style='display:none' disabled/>

<div class="mb-3">
  <label>Vardas</label>
  <input class="form-control" type="text" name="vardas" value="<?=$autorius['vardas']??''?>" >
</div>

<div class="mb-3">
  <label>Pavardė</label>
  <input class="form-control" type="text" name="pavarde" value="<?=$autorius['pavarde']??''?>" >
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
			</tr>
		</thead>
		<tbody>
      <tr>
        <td></td>
        <td><input class="form-control" type="text" name="pavadinimas" value="" placeholder="Pavadinimas"></td>
        <td><input class="form-control" type="text" name="kategorija" value="" placeholder="Kategorija"></td>
        <td><input class="form-control" type="text" name="metai" value="" placeholder="Metai"></td>
        <td><select class="form-control" name="populiarumas">
          <option value="" disabled selected>Populiarumas</option>
          <option value="Mažas">Mažas</option>
          <option value="Vidutinis">Vidutinis</option>
          <option value="Didelis">Didelis</option>
        </select>
        <td><input class="form-control" type="text" name="likutis" value="" placeholder="Likutis"></td>
        <td>
          <input class="form-control btn btn-secondary" type="submit" name="prideti_autoriaus_knyga" value="Pridėti">
        </td>
      </tr>
    </tbody>
    <tfoot>

    </tfoot>
    </table>

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
        <?php foreach ($autoriaus_knygos as $autoriaus_knyga): ?>
          <tr>
            <td><?=$autoriaus_knyga['id']?></td>
            <td><?=$autoriaus_knyga['pavadinimas']?></td>
            <td><?=$autoriaus_knyga['kategorija']?></td>
            <td><?=$autoriaus_knyga['metai']?></td>
            <td><?=$autoriaus_knyga['populiarumas']?></td>
            <td><?=$autoriaus_knyga['likutis']?></td>
            <td>
              <a class="btn btn-danger btn-sm" href="autoriai/istrinti_knyga/<?=$autoriaus_knyga['id']?>/<?=$autorius['id']?>">Ištrinti</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>

    </table>
    <?php endif ?>


</form>
