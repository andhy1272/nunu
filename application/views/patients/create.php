<div class="content-header">
	<h1><?= $page_title; ?></h1>

	<div class="page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn blue">ATRAS</a>
		<a href="<?php echo base_url(); ?>patients/" class="btn red">CANCELAR</a>
	</div>
</div>


<?php $errors = validation_errors(); ?>
<?php if($errors): ?>
	<div class="notifications error">
		<h6>ERROR</h6>
		<?php echo $errors; ?>
	</div>
<?php endif; ?>


<?= $result; ?>
<?= $form_data['patient_id_type']; ?> 
<?= $form_data['patient_blood_type']; ?>
<?= $form_data['patient_sex']; ?>



<?php echo form_open('patients/create'); ?>

	<div class="box-container">

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n General</span></div>
			<div class="box-content">
				<div class="box-element halfs-container">
					<label>Identificaci&oacute;n:</label>
					<select name="patient-id-type" class="form-control half-left">
						<option value="id">Cedula</option>
						<option value="passport">Pasaporte</option>
					</select>
					<input type="text" name="patient-id-number" class="form-control half-right" placeholder="ID Número" value="<?= $form_data['patient_id_number']; ?>">
				</div>
				<div class="box-element">
					<label>Nombre:</label>
					<input type="text" name="patient-name" class="form-control" placeholder="Nombre" value="<?= $form_data['patient_name']; ?>">
				</div>
				<div class="box-element">
					<label>Apellidos:</label>
					<input type="text" name="patient-last-name" class="form-control" placeholder="Apellidos" value="<?= $form_data['patient_last_name']; ?>">
				</div>
				<div class="box-element">
					<label>Fecha de Nacimiento:</label>
					<input type="text" name="patient-birthdate" class="form-control date" value="<?= $form_data['patient_birthdate']; ?>">
				</div>
				<div class="box-element">
					<label>Sexo:</label>
					<select name="patient-sex" class="form-control">
						<option value="No Definido">No Definido</option>
						<option value="masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
					</select>
				</div>
				<div class="box-element">
					<label>Tipo Sangre:</label>
					<select name="patient-blood-type" class="form-control">
						<option value="Otro">Otro</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="A-">A-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>	
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n de Contacto</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Celular:</label>
					<input type="text" name="patient-phone1" class="form-control" placeholder="+(000) 111 2233" value="<?= $form_data['patient_phone1']; ?>">
				</div>
				<div class="box-element">
					<label>Tel&eacute;fono:</label>
					<input type="text" name="patient-phone2" class="form-control" placeholder="+(000) 111 2233" value="<?= $form_data['patient_phone2']; ?>">	
				</div>
				<div class="box-element">
					<label>E-mail:</label>
					<input type="text" name="patient-email" class="form-control" placeholder="nunu.support@gmail.com" value="<?= $form_data['patient_email']; ?>">	
				</div>
				<div class="box-element">
					<label>Direcci&oacute;n:</label> <br/>
					<textarea rows="4" name="patient-address" maxlength="255" class="form-control count-chars" placeholder="Direcci&oacute;n"><?= $form_data['patient_address']; ?></textarea>
					<span class="char-counter" title="Remain chars">255</span>
				</div>
			</div>
		</div>

		<div class="box box-3">
			<div class="box-name"><span>Informaci&oacute;n Adicional</span></div>
			<div class="box-content">
				<div class="box-element">
					<label>Observaciones:</label> <br/>
					<textarea rows="10" name="patient-observations" class="form-control" placeholder="Observaciones"><?= $form_data['patient_observations']; ?></textarea>
				</div>
			</div>
		</div>

	</div>


	<div class="box box-historial">
		<div class="box-name"><span>ANTECEDENTES</span></div>
		<div class="box-content">

			<div class="accordion accordion-horizontal">
				<div class="accordion-tab tab-title" data-index="tab-1">
					<span>Heredo Familiares</span>
				</div>
				<div class="accordion-tab tab-content tab-1">

					<div class="background-question">
						<p>Alguien en su familia a sufrido de:</p>
						<ul>
							<li>- Asma</li>
							<li>- Diabetes</li>
							<li>- Hipertension</li>   
							<li>- Cardiopatia</li>      
							<li>- Hepatopatia</li> 
							<li>- Nefropatia</li> 
							<li>- Enf. Mentales</li> 
							<li>- Osteoarticulares</li> 
							<li>- Enf. Alergicas</li> 
							<li>- Enf. Endocrinas </li> 
							<li>- Neoplasias</li> 
						</ul>
					</div>



					<div class="box-element third-width">
						<label>Asma:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-asthma" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Diabetes:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-diabetes" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Hipertension:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-hypertension" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Cardiopatia:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-cardiac-ill" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Hepatopatia:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-liver-ill" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Nefropatia:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-nephropathy" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Enf. Mentales:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-mental-ill" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Osteoarticulares:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-osteoarticular" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Enf. Alergicas:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-alergies" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Enf. Endocrinas:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-endrocrine" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
					<div class="box-element third-width">
						<label>Neoplasias:</label> <br/>
						<textarea rows="3" maxlength="255" name="background-neoplasms" class="form-control count-chars"></textarea>
						<span class="char-counter" title="Remain chars">255</span>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-2">
					<span>Personales Patologicos</span>
				</div>
				<div class="accordion-tab tab-content tab-2">
					<div class="background-question">
						<p>Ha sido usted sometido a procedimientos:</p>
						<ul>
							<li>Quirurgicos</li>
							<li>Transfusion</li>
							<li>Alergias</li>   
							<li>Traumaticos</li>      
							<li>Patologia Cronica</li> 
						</ul>
					</div>
					<div class="background-control">
					</div>
					<div class="background-data">
						<textarea class="control visible"></textarea>
						<textarea class="control hide" name="background-patologic"></textarea>
					</div>
				</div>

				<div class="accordion-tab tab-title" data-index="tab-3">
					<span>Personales No Patologicos</span>
				</div>
				<div class="accordion-tab tab-content tab-3">
					
				</div>

				<div class="accordion-tab tab-title" data-index="tab-4">
					<span>Neonatales</span>
				</div>
				<div class="accordion-tab tab-content tab-4">
					
				</div>

				<div class="accordion-tab tab-title" data-index="tab-5">
					<span>Gineco Obstetricos</span>
				</div>
				<div class="accordion-tab tab-content tab-5">
					
				</div>
			</div>

		</div>
	</div>

	<div class="actions page-actions">
		<a href="<?php echo base_url(); ?>patients/" class="btn red">CANCELAR</a>
		<button type="reset" class="btn blue">LIMPIAR</button>
		<button type="submit" class="btn green">REGISTRAR</button>
	</div>
<?php echo form_close(); ?>







