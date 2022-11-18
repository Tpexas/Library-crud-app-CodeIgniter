<h1>Naujas narys</h1>

<form class="" action="<?php echo base_url()?>main/form_validation" method="post">

  <div class="mb-3">
    <label>Vardas</label>
    <input class="form-control" type="text" name="vardas" required>
  </div>

  <div class="mb-3">
    <label>Pavardė</label>
    <input class="form-control" type="text" name="pavarde" required>
  </div>

<div class="mb-3">
  <label>El. Paštas</label>
<input class="form-control" type="text" name="el_pastas">
</div>

<div class="mb-3">
  <label>Tel. nr.</label>
<input class="form-control" type="text" name="tel_nr">
</div>

<div class="mb-3">
  <label></label>
<input class="form-control btn btn-success" type="submit" name="" value="Išsaugoti">
</div>

</form>
