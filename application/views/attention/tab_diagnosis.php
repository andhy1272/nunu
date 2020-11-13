<?php
 //$diagnosis_info variable comes from "edit.php" file
?>

<fieldset class="cie10-diagnosis">
  <legend>Diagnostico CIE-10</legend>
  <button type="button" class="btn blue cie10-search-popup">AGREGAR</button>
  <br/><br/>
  <textarea name="atention-cie10-diagnosis" class="form-control cie10-results" rows="6"><?php echo $diagnosis_info['atention_cie10_diagnosis']; ?></textarea>
</fieldset>
<fieldset class="open-diagnosis">
  <legend>Diagnostico Abierto</legend>
  <textarea name="atention-open-diagnosis" class="form-control" rows="6"><?php echo $diagnosis_info['atention_open_diagnosis']; ?></textarea>
</fieldset>
