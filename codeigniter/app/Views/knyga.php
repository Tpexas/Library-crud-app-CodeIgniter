<h1>Nauja knyga</h1>

<?=form_open() ?>

<input type="hidden" name="id" value="<?=$knyga['id']??''?>">

<div class="collapse mb-3" id="collapseExample">
  <label>Vardas</label>
  <input class="form-control" type="text" name="vardas" style="margin-bottom:1rem" value="<?=$knyga['vardas']??''?>" >
  <label>Pavardė</label>
  <input class="form-control" type="text" name="pavarde" value="<?=$knyga['pavarde']??''?>" >
</div>

<div class="mb-3">

  <label>Pavadinimas</label>
<input class="form-control" type="text" name="pavadinimas" value="<?=$knyga['pavadinimas']??''?>" >
</div>

<div class="mb-3">
  <label>Kategorija</label>
<input class="form-control" type="text" name="kategorija" value="<?=$knyga['kategorija']??''?>" >
</div>

<div class="mb-3">
  <label>Metai</label>
<input class="form-control" type="number" name="metai" value="<?=$knyga['metai']??''?>" >
</div>

<div class="mb-3">
  <label>Populiarumas</label>
<select class="form-control" name="populiarumas">
  <option value="Mažas"<?=(($knyga['populiarumas']??'')=='Mažas')?' selected':''?>>Mažas</option>
  <option value="Vidutinis"<?=(($knyga['populiarumas']??'')=='Vidutinis')?' selected':''?>>Vidutinis</option>
  <option value="Didelis"<?=(($knyga['populiarumas']??'')=='Didelis')?' selected':''?>>Didelis</option>
</select>
</div>

<div class="mb-3">
  <label>Likutis</label>
<input class="form-control" type="number" name="likutis" value="<?=$knyga['likutis']??''?>" >
</div>

<div class="mb-3">
  <label></label>
<input class="form-control btn btn-success" type="submit" name="<?=($edit)?'redaguoti':'nauja'?>" value="Išsaugoti">
</div>

</form>
