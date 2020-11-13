<div class="content-header">
	<h1><?= $page_title; ?></h1>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>




<?php print_r($exams_info); ?>




<?php echo form_open('atention/edit'); ?>

	<div class="box-container atention atention-edit edit-control">

		<div class="box box-margins atention-general">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Paciente:</label>
					<input type="text" name="patient-name" class="form-control search-patient-control" value="<?php echo $general_info['patient_fullname']; ?>" readonly>
					<input type="hidden" name="patient-id" class="patient-id" value="<?php echo $general_info['attention_patient_id']; ?>">
					<input type="hidden" name="attention-id" class="attention-id" value="<?php echo $general_info['attention_id']; ?>">
				</div>
				<div class="box-element">
					<label>Establecimiento:</label>
					<input type="text" name="attention-store" class="form-control" value="<?php echo $general_info['store_name']; ?>" readonly>
				</div>
				<div class="box-element">
					<label>Servicio:</label>
					<input type="text" name="attention-service" class="form-control" value="<?php echo $general_info['attention_service']; ?>" readonly>
				</div>
				<div class="box-element date-section">
					<label>Fecha:</label>
					<input type="text" name="attention-date" class="form-control" value="<?php echo $general_info['attention_date']; ?>" readonly>
				</div>
				<div class="box-element hour-section">
					<label>Hora:</label>
					<input type="text" name="attention-time" class="form-control" value="<?php echo $general_info['attention_time']; ?>" readonly>
				</div>
				<div class="box-element">
					<label>Detalles:</label>
					<input type="text" name="attention-notes" class="form-control" value="<?php echo $general_info['attention_notes']; ?>" readonly>
				</div>

				<div class="actions">
					<a href="<?php echo base_url(); ?>" class="btn blue">FINALIZAR ATENCION</a>
				</div>
			</div>
		</div>



    <!-- TABS -->
		<div class="box atention-tabs">
			<div class="box-name"><span>Evoluci&oacute;n</span></div>
			<div class="box-content">

				<div class="tabs-container">
					<ul class="tab-tiles">
						<li data-index="tab-1">Examen F&iacute;sico</li>
						<li data-index="tab-2">Diagnostico</li>
						<li data-index="tab-3">Prescripcion</li>
						<li data-index="tab-4">Examenes</li>
						<li data-index="tab-5">Imagenes</li>
						<li data-index="tab-6">Procedimientos</li>
					</ul>

					<div class="tab-contents">

						<!--TAB PHYSICAL EXAM-->
						<div data-index="tab-1">
							<fieldset class="atention-signs-section">
								<legend>Signos Vitales</legend>
								<div class="box-element">
									<label title="Presion Arterial">P.A.(mmHg):</label>
									<input type="text" name="atention-blood-pressure" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9 /-]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_blood_pressure']; ?>"
										title="Valor anterior: <?php echo $physical_info['attention_blood_pressure']; ?>">
								</div>
								<div class="box-element">
									<label title="Frecuencia Cardiaca">F.C.(Ipm):</label>
									<input type="text" name="atention-heart-rate" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_heart_rate']; ?>">
								</div>
								<div class="box-element">
									<label title="Frecuencia Respiratoria">F.R.(rpm):</label>
									<input type="text" name="atention-breath-rate" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_breath_rate']; ?>">
								</div>
								<div class="box-element">
									<label title="Temperatura">Temperatura(°C):</label>
									<input type="text" name="atention-temperature" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_temperature']; ?>">
								</div>
							</fieldset>

							<fieldset class="atention-antropometric-section">
								<legend>Antropometr&iacute;a</legend>
								<div class="box-element">
									<label title="Peso">Peso(Kg):</label>
									<input type="text" name="atention-weight" class="form-control BMI-weight"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_weight']; ?>">
								</div>
								<div class="box-element">
									<label title="Estatura">Estatura(cm):</label>
									<input type="text" name="atention-height" class="form-control BMI-height"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_height']; ?>">
								</div>
								<div class="box-element">
									<label title="Indice Masa Corporal">I.M.C.:</label>
									<input type="text" name="atention-BMI" class="form-control BMI-result" value="<?php echo $physical_info['attention_BMI']; ?>">
									<script type="text/javascript">
										$(document).ready(function() {
											$('.BMI-result').click(function() { calc_BMI(); });

											$('.BMI-weight').focusout(function() { calc_BMI(); });

											$('.BMI-height').focusout(function() { calc_BMI(); });
										});

										function calc_BMI() {
											_weight = $('.BMI-weight').val();
											_height = $('.BMI-height').val();

											if ( (_weight != "") && (_height != "") ) {
												_height = _height / 100;
												_imc = _weight / (_height * _height);

												$('.BMI-result').val(_imc.toFixed(2));
											}
										}
									</script>
								</div>
								<div class="box-element">
									<label title="Perimetro Cefalico">Perimetro Cef&aacute;lico(cm):</label>
									<input type="text" name="atention-head-circunference" class="form-control"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
										value="<?php echo $physical_info['attention_head_circunference']; ?>">
								</div>
							</fieldset>

							<fieldset class="atention-exploration-section">
								<legend>Exploraci&oacute;n</legend>
								<div class="box-element float-left">
									<label title="Piel">Piel:</label>
									<select name="atention-skin" class="form-control">
										<option value="Sin Alteraciones">Sin Alteraciones</option>
										<option value="Palidez">Palidez</option>
										<option value="Icterico">Icterico</option>
										<option value="Cianosis">Cianosis</option>
									</select>
									<br/>
									<textarea name="atention-skin-details" class="form-control" placeholder="Observaciones Piel"><?php echo $physical_info['attention_skin_details']; ?></textarea>
								</div>

								<div class="box-element float-right">
									<label title="Conciencia">Conciencia:</label>
									<select name="atention-conscience" class="form-control">
										<option value="Orientado">Orientado</option>
										<option value="Desorientado">Desorientado</option>
										<option value="Obnubilacion">Obnubilacion</option>
										<option value="Somnolencia">Somnolencia</option>
										<option value="Estupor">Estupor</option>
										<option value="Coma">Coma</option>
									</select>
								</div>

								<div class="box-element float-right">
									<label title="Marcha">Marcha:</label>
									<textarea name="atention-walk" class="form-control" placeholder="(Normal/Alteracion)"><?php echo $physical_info['attention_walk']; ?></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Biotipo">Biotipo:</label>
									<textarea name="atention-biotype" class="form-control" placeholder="(Normal/Atletico/Picnico)"><?php echo $physical_info['attention_biotype']; ?></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Neurologico">Neurologico:</label>
									<textarea name="atention-neurologic" class="form-control"><?php echo $physical_info['attention_neurologic']; ?></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Cabeza">Cabeza:</label>
									<textarea name="atention-head" class="form-control"><?php echo $physical_info['attention_head']; ?></textarea>
								</div>
								<div class="box-element float-right">
									<label title="ORL">ORL:</label>
									<textarea name="atention-ENT" class="form-control"><?php echo $physical_info['attention_ENT']; ?></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Cuello">Cuello:</label>
									<textarea name="atention-neck" class="form-control"><?php echo $physical_info['attention_neck']; ?></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Torax">Torax:</label>
									<textarea name="atention-thorax" class="form-control"><?php echo $physical_info['attention_thorax']; ?></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Abdomen">Abdomen:</label>
									<textarea name="atention-abdomen" class="form-control"><?php echo $physical_info['attention_abdomen']; ?></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Genito-Urinario">Genito-Urinario:</label>
									<textarea name="atention-genitourinary" class="form-control"><?php echo $physical_info['attention_genitourinary']; ?></textarea>
								</div>
								<div class="box-element float-left">
									<label title="Columna Vertebral">Columna Vertebral:</label>
									<textarea name="atention-spine" class="form-control"><?php echo $physical_info['attention_spine']; ?></textarea>
								</div>
								<div class="box-element float-right">
									<label title="Miembros Superiores Inferiores">Miembros Sup/Inf:</label>
									<textarea name="atention-limbs" class="form-control"><?php echo $physical_info['attention_limbs']; ?></textarea>
								</div>
							</fieldset>

							<fieldset>
								<div class="box-element">
									<label title="Observaciones">Observaciones:</label>
									<textarea name="atention-observations" class="form-control"><?php echo $physical_info['attention_observations']; ?></textarea>
								</div>
							</fieldset>
						</div>

            <!--TAB DIAGNOSIS-->
						<div data-index="tab-2">
							<?php $this->load->view('attention/tab_diagnosis'); ?>
						</div>

            <!--TAB PRESCRIPTION-->
						<div data-index="tab-3">
							<fieldset class="prescription">
								<legend>Prescripci&oacute;n</legend>
								<button type="button" class="btn blue drugs-search-popup">AGREGAR MEDICAMENTO</button>
								<br/><br/>
								<table class="drugs-results results">
									<thead>
										<td>Medicamentos</td>
										<td width="100">Cant.</td>
										<td>Indicaciones</td>
										<td width="100">&nbsp;</td>
									</thead>

									<tbody>
										<?php
											foreach ($prescription_info as $drug) {
												echo "<tr>";
												echo "<td class='name'>";
												echo $drug['attention_prescription_drug_name'] . "<br/><span class='generic'>" . $drug['attention_prescription_drug_generic'] . "</span>";
												echo "</td>";

												echo "<td class='qty'><input type='text' class='form-control' name='qty-' value='" . $drug['attention_prescription_drug_qty'] . "'></td>";

												echo "<td><textarea class='form-control' name='indic-'>" . $drug['attention_prescription_drug_indications'] . "</textarea></td>";

												echo "<td class='actions'>";
												echo "<span class='remove icon-cancel-x' data=''>Eliminar</span>";
												echo "</td>";
												echo "</tr>";
											}
										?>
									</tbody>
								</table>

								<input type="hidden" name="prescription-ids" id="prescription-ids" value="">
							</fieldset>
						</div>

						<!--TAB EXAMS-->
						<div data-index="tab-4" class="tab-exams">
							<?php $this->load->view('attention/tab_exams'); ?>
						</div>

						<!--TAB IMAGES-->
						<div data-index="tab-5">
							Imagenes
						</div>

						<!--TAB PROCEDURES-->
						<div data-index="tab-6">
							Procedimientos
						</div>

					</div><!--END TAB COTENTS-->

				</div><!--END TAB COTAINER-->

			</div><!--END BOX-->

		</div><!--END TAB SECTION-->


	</div>

	<div class="actions page-actions">
		<a href="<?php echo base_url(); ?>" class="btn red">CANCELAR</a>
		<button type="reset" class="btn blue">LIMPIAR</button>
		<button type="submit" class="btn green">GUARDAR</button>
	</div>
<?php echo form_close(); ?>





<?php $this->load->view('templates/calendar'); ?>

<?php $this->load->view('cie10/search'); ?>

<?php $this->load->view('drugs/search'); ?>
